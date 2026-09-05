<?php
if (!function_exists('mc_page_config')) require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/module_editor_schema.php';

function mc_structured_runtime_render($module = null) {
    $module = $module ? basename((string)$module) : mc_current_module();
    $cfg = mc_page_config($module);
    if (empty($cfg['enabled'])) return;

    $values = isset($cfg['structured']) && is_array($cfg['structured']) ? $cfg['structured'] : [];
    if (!$values) return;

    $schema = mc_module_editor_schema($module);
    $fields = mc_module_editor_fields($schema);
    $ops = [];
    $css = [];

    foreach ($values as $key=>$raw) {
        if (!isset($fields[$key])) continue;
        $field = $fields[$key];
        $value = trim((string)$raw);
        if ($value === '') continue;

        $type = (string)($field['type'] ?? 'text');
        $action = (string)($field['action'] ?? 'text');

        if ($type === 'color') {
            if (!preg_match('/^#[0-9a-fA-F]{6}$/', $value)) continue;
        }
        if ($type === 'image') {
            $value = mc_safe_local_path($value);
            if ($value === '') continue;
        }

        if ($action === 'css') {
            foreach ((array)($field['rules'] ?? []) as $rule) {
                $selector = trim((string)($rule['selector'] ?? ''));
                $property = trim((string)($rule['property'] ?? ''));
                $template = (string)($rule['template'] ?? '%s');
                if ($selector === '' || $property === '') continue;
                $cssValue = sprintf($template, $value);
                $css[] = $selector . '{' . $property . ':' . $cssValue . ' !important;}';
            }
            continue;
        }

        $selector = trim((string)($field['selector'] ?? ''));
        if ($selector === '') continue;
        $op = ['selector'=>$selector, 'action'=>$action, 'value'=>$value];
        if ($action === 'attr') {
            $attr = preg_replace('/[^a-zA-Z0-9_:-]/', '', (string)($field['attr'] ?? ''));
            if ($attr === '') continue;
            $op['attr'] = $attr;
        }
        $ops[] = $op;
    }

    if ($css) {
        echo '<style id="mc-module-structured-css">' . implode("\n", $css) . '</style>' . "\n";
    }
    if (!$ops) return;

    echo '<script id="mc-module-structured-runtime">(function(){var ops=' . json_encode($ops, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) . ';function q(s){try{return document.querySelector(s)}catch(e){return null}}function textNode(el,first){var nodes=el.childNodes||[];if(first){for(var i=0;i<nodes.length;i++){if(nodes[i].nodeType===3)return nodes[i]}}else{for(var j=nodes.length-1;j>=0;j--){if(nodes[j].nodeType===3)return nodes[j]}}return null}function apply(){ops.forEach(function(o){var el=q(o.selector);if(!el)return;if(o.action==="attr"){el.setAttribute(o.attr,o.value);return}if(o.action==="first_text"){var n=textNode(el,true);if(n)n.nodeValue=o.value+" ";else el.insertBefore(document.createTextNode(o.value+" "),el.firstChild);return}if(o.action==="last_text"){var n2=textNode(el,false);if(n2)n2.nodeValue=" "+o.value;else el.appendChild(document.createTextNode(" "+o.value));return}el.textContent=o.value})}if(document.readyState==="loading")document.addEventListener("DOMContentLoaded",apply);else apply();})();</script>' . "\n";
}

mc_structured_runtime_render();
?>