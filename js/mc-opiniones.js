(function(){
    'use strict';

    function findReviewsSection(){
        var headings = document.querySelectorAll('h2');
        for(var i=0;i<headings.length;i++){
            var text=(headings[i].textContent||'').trim().toLowerCase();
            if(text.indexOf('lo que dicen nuestros clientes')!==-1){
                return headings[i].closest('section');
            }
        }
        return null;
    }

    var section=findReviewsSection();
    if(!section) return;

    var css=document.createElement('style');
    css.textContent=`
    .mc-reviews-wrap{max-width:1280px;margin:0 auto;padding:0 20px}
    .mc-reviews-head{text-align:center;max-width:760px;margin:0 auto 38px}
    .mc-reviews-eyebrow{color:#f26e22;font-weight:800;text-transform:uppercase;letter-spacing:.2em;font-size:13px}
    .mc-reviews-title{font-family:Poppins,Inter,sans-serif;font-size:clamp(2rem,4vw,2.7rem);font-weight:900;color:#111827;margin:10px 0 0}
    .mc-reviews-summary{display:flex;flex-wrap:wrap;gap:14px;justify-content:center;align-items:center;margin-top:18px;color:#4b5563}
    .mc-reviews-score{font-size:1.65rem;font-weight:900;color:#0d5c2e}
    .mc-reviews-stars{color:#f26e22;letter-spacing:3px;font-size:18px}
    .mc-reviews-actions{display:flex;justify-content:center;margin-top:20px}
    .mc-review-open{border:0;background:#0d5c2e;color:#fff;border-radius:12px;padding:13px 22px;font-weight:800;cursor:pointer;box-shadow:0 12px 30px rgba(13,92,46,.2);transition:.25s}
    .mc-review-open:hover{background:#0a4d26;transform:translateY(-2px)}
    .mc-reviews-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:26px}
    .mc-review-card{background:linear-gradient(135deg,rgba(255,255,255,.82),rgba(255,255,255,.55));border:1px solid rgba(13,92,46,.12);box-shadow:0 18px 45px rgba(5,39,18,.08);backdrop-filter:blur(18px);border-radius:22px;padding:30px;min-height:310px;display:flex;flex-direction:column;transition:.3s}
    .mc-review-card:hover{transform:translateY(-5px);box-shadow:0 26px 60px rgba(5,39,18,.13)}
    .mc-review-card .stars{color:#f26e22;letter-spacing:3px;font-size:18px}
    .mc-review-card .comment{color:#5b6472;line-height:1.75;font-size:16px;margin-top:20px;flex:1}
    .mc-review-person{display:flex;align-items:center;gap:13px;margin-top:24px}
    .mc-review-avatar{width:52px;height:52px;border-radius:999px;background:#0d5c2e;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:900}
    .mc-review-card:nth-child(3n+2) .mc-review-avatar{background:#f26e22}
    .mc-review-name{display:block;color:#17251d;font-weight:800}
    .mc-review-meta{display:block;color:#9ca3af;font-size:12px;margin-top:2px}
    .mc-review-empty{grid-column:1/-1;text-align:center;padding:36px;background:rgba(255,255,255,.7);border:1px dashed rgba(13,92,46,.25);border-radius:22px;color:#6b7280}
    .mc-review-nav{display:flex;justify-content:center;align-items:center;gap:10px;margin-top:26px}
    .mc-review-nav button{border:1px solid #dfe7e2;background:#fff;color:#0d5c2e;width:42px;height:42px;border-radius:999px;cursor:pointer;font-weight:900}
    .mc-review-nav button:disabled{opacity:.35;cursor:not-allowed}
    .mc-review-dots{font-size:12px;color:#98a49d;min-width:74px;text-align:center}
    .mc-review-modal{position:fixed;inset:0;background:rgba(3,26,13,.68);backdrop-filter:blur(8px);z-index:99999;display:none;align-items:center;justify-content:center;padding:18px}
    .mc-review-modal.open{display:flex}
    .mc-review-dialog{width:min(620px,100%);max-height:92vh;overflow:auto;background:#fff;border-radius:24px;box-shadow:0 30px 90px rgba(0,0,0,.28);padding:28px}
    .mc-review-dialog-head{display:flex;justify-content:space-between;gap:18px;align-items:flex-start;margin-bottom:20px}
    .mc-review-dialog h3{font-family:Poppins,Inter,sans-serif;font-size:1.55rem;font-weight:900;color:#173222;margin:0}
    .mc-review-dialog p{color:#6b7280;margin:5px 0 0}
    .mc-review-close{border:0;background:#eef3ef;width:38px;height:38px;border-radius:999px;cursor:pointer;font-size:20px;color:#294535}
    .mc-review-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
    .mc-review-field{display:flex;flex-direction:column;gap:7px}
    .mc-review-field.full{grid-column:1/-1}
    .mc-review-field label{font-weight:800;color:#294535;font-size:13px}
    .mc-review-field input,.mc-review-field select,.mc-review-field textarea{width:100%;border:1px solid #dbe4de;border-radius:12px;padding:12px 13px;font:inherit;outline:none;background:#fff}
    .mc-review-field input:focus,.mc-review-field select:focus,.mc-review-field textarea:focus{border-color:#0d5c2e;box-shadow:0 0 0 3px rgba(13,92,46,.08)}
    .mc-review-field textarea{min-height:130px;resize:vertical}
    .mc-star-picker{display:flex;gap:7px;flex-direction:row-reverse;justify-content:flex-end}
    .mc-star-picker input{position:absolute;opacity:0;pointer-events:none}
    .mc-star-picker label{font-size:32px;color:#d1d5db;cursor:pointer;line-height:1;transition:.15s}
    .mc-star-picker label:hover,.mc-star-picker label:hover~label,.mc-star-picker input:checked~label{color:#f26e22}
    .mc-review-consent{display:flex;gap:10px;align-items:flex-start;color:#657069;font-size:13px;margin-top:4px}
    .mc-review-consent input{margin-top:3px}
    .mc-review-submit{width:100%;border:0;background:#f26e22;color:white;border-radius:12px;padding:14px;font-weight:900;cursor:pointer;margin-top:6px}
    .mc-review-submit:disabled{opacity:.55;cursor:wait}
    .mc-review-msg{display:none;border-radius:12px;padding:12px 14px;font-weight:700;font-size:13px;margin-bottom:15px}
    .mc-review-msg.ok{display:block;background:#edf8f1;color:#0d5c2e;border:1px solid #cdebd7}
    .mc-review-msg.error{display:block;background:#fff0f0;color:#b42318;border:1px solid #ffd5d2}
    .mc-review-hp{position:absolute!important;left:-9999px!important;width:1px!important;height:1px!important;overflow:hidden!important}
    @media(max-width:850px){.mc-reviews-grid{grid-template-columns:1fr}.mc-review-card{min-height:0}.mc-review-form-grid{grid-template-columns:1fr}.mc-review-field.full{grid-column:auto}.mc-review-dialog{padding:22px}.mc-reviews-wrap{padding:0 16px}}
    `;
    document.head.appendChild(css);

    section.innerHTML=`
      <div class="mc-reviews-wrap">
        <div class="mc-reviews-head">
          <span class="mc-reviews-eyebrow">Experiencias reales</span>
          <h2 class="mc-reviews-title">Lo que dicen nuestros clientes</h2>
          <div class="mc-reviews-summary" id="mc-reviews-summary"><span>Cargando opiniones...</span></div>
          <div class="mc-reviews-actions"><button class="mc-review-open" type="button">Califica tu experiencia</button></div>
        </div>
        <div class="mc-reviews-grid" id="mc-reviews-grid"><div class="mc-review-empty">Cargando opiniones de nuestros clientes...</div></div>
        <div class="mc-review-nav" id="mc-review-nav" hidden>
          <button type="button" data-dir="prev" aria-label="Opiniones anteriores">‹</button>
          <span class="mc-review-dots" id="mc-review-dots"></span>
          <button type="button" data-dir="next" aria-label="Opiniones siguientes">›</button>
        </div>
      </div>
    `;

    var modal=document.createElement('div');
    modal.className='mc-review-modal';
    modal.setAttribute('aria-hidden','true');
    modal.innerHTML=`
      <div class="mc-review-dialog" role="dialog" aria-modal="true" aria-labelledby="mc-review-title">
        <div class="mc-review-dialog-head">
          <div><h3 id="mc-review-title">Califica tu experiencia</h3><p>Tu opinión nos ayuda a mejorar. Se publicará solo después de ser revisada.</p></div>
          <button type="button" class="mc-review-close" aria-label="Cerrar">×</button>
        </div>
        <div class="mc-review-msg" id="mc-review-msg"></div>
        <form id="mc-review-form">
          <input type="hidden" name="csrf" value="">
          <div class="mc-review-hp" aria-hidden="true"><label>Sitio web<input name="website" tabindex="-1" autocomplete="off"></label></div>
          <div class="mc-review-form-grid">
            <div class="mc-review-field full">
              <label>Calificación *</label>
              <div class="mc-star-picker" aria-label="Selecciona de 1 a 5 estrellas">
                <input id="mc-star-5" type="radio" name="calificacion" value="5"><label for="mc-star-5">★</label>
                <input id="mc-star-4" type="radio" name="calificacion" value="4"><label for="mc-star-4">★</label>
                <input id="mc-star-3" type="radio" name="calificacion" value="3"><label for="mc-star-3">★</label>
                <input id="mc-star-2" type="radio" name="calificacion" value="2"><label for="mc-star-2">★</label>
                <input id="mc-star-1" type="radio" name="calificacion" value="1"><label for="mc-star-1">★</label>
              </div>
            </div>
            <div class="mc-review-field"><label>Nombre (opcional)</label><input name="nombre" maxlength="80" placeholder="Ej. María Díaz" autocomplete="name"></div>
            <div class="mc-review-field"><label>Sede *</label><select name="sede" required><option value="">Selecciona una sede</option></select></div>
            <div class="mc-review-field full"><label>Cuéntanos tu experiencia *</label><textarea name="comentario" minlength="10" maxlength="600" required placeholder="Escribe tu experiencia con Multicredit..."></textarea></div>
            <div class="mc-review-field full"><label class="mc-review-consent"><input type="checkbox" name="consentimiento" value="1" required><span>Autorizo a CEPRODEMIC MULTICREDIT a revisar y, si corresponde, publicar esta opinión en su sitio web.</span></label></div>
            <div class="mc-review-field full"><button type="submit" class="mc-review-submit">Enviar calificación</button></div>
          </div>
        </form>
      </div>
    `;
    document.body.appendChild(modal);

    var api='opiniones_api.php';
    var state={reviews:[],page:0,csrf:'',sedes:[]};
    var grid=document.getElementById('mc-reviews-grid');
    var summary=document.getElementById('mc-reviews-summary');
    var nav=document.getElementById('mc-review-nav');
    var dots=document.getElementById('mc-review-dots');
    var form=document.getElementById('mc-review-form');
    var msg=document.getElementById('mc-review-msg');

    function escapeHtml(value){
        return String(value==null?'':value).replace(/[&<>'"]/g,function(c){return {'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c];});
    }

    function pageSize(){return window.innerWidth<850?1:3;}
    function stars(n){n=Math.max(1,Math.min(5,Number(n)||0));return '★★★★★'.slice(0,n)+'☆☆☆☆☆'.slice(0,5-n);}

    function render(){
        var size=pageSize();
        var pages=Math.max(1,Math.ceil(state.reviews.length/size));
        if(state.page>=pages) state.page=pages-1;
        var start=state.page*size;
        var items=state.reviews.slice(start,start+size);

        if(!items.length){
            grid.innerHTML='<div class="mc-review-empty"><strong>Aún no hay opiniones publicadas.</strong><br>Tu experiencia puede ser la primera en aparecer aquí.</div>';
        }else{
            grid.innerHTML=items.map(function(r){
                return '<article class="mc-review-card">'+
                  '<div class="stars" aria-label="'+escapeHtml(r.calificacion)+' de 5 estrellas">'+escapeHtml(stars(r.calificacion))+'</div>'+
                  '<p class="comment">“'+escapeHtml(r.comentario)+'”</p>'+
                  '<div class="mc-review-person"><div class="mc-review-avatar">'+escapeHtml(r.initials||'MC')+'</div><div><strong class="mc-review-name">'+escapeHtml(r.nombre||'Cliente de Multicredit')+'</strong><span class="mc-review-meta">'+escapeHtml(r.sede||'Cliente')+(r.destacado?' · Destacada':'')+'</span></div></div>'+
                '</article>';
            }).join('');
        }

        nav.hidden=state.reviews.length<=size;
        if(!nav.hidden){
            dots.textContent=(state.page+1)+' / '+pages;
            nav.querySelector('[data-dir="prev"]').disabled=state.page<=0;
            nav.querySelector('[data-dir="next"]').disabled=state.page>=pages-1;
        }
    }

    function fillSedes(){
        var select=form.querySelector('select[name="sede"]');
        select.innerHTML='<option value="">Selecciona una sede</option>'+state.sedes.map(function(s){return '<option value="'+escapeHtml(s)+'">'+escapeHtml(s)+'</option>';}).join('');
    }

    function load(){
        fetch(api,{credentials:'same-origin',headers:{'Accept':'application/json'}})
          .then(function(r){return r.json().then(function(data){if(!r.ok||!data.ok)throw new Error(data.message||'No se pudieron cargar las opiniones.');return data;});})
          .then(function(data){
              state.reviews=Array.isArray(data.reviews)?data.reviews:[];
              state.csrf=data.csrf||'';
              state.sedes=Array.isArray(data.sedes)?data.sedes:[];
              form.querySelector('input[name="csrf"]').value=state.csrf;
              fillSedes();
              var total=Number(data.summary&&data.summary.total||0);
              var avg=Number(data.summary&&data.summary.average||0);
              summary.innerHTML=total>0
                ? '<span class="mc-reviews-score">'+avg.toFixed(1)+'/5</span><span class="mc-reviews-stars">★★★★★</span><span>Basado en '+total+' opinión'+(total===1?'':'es')+' publicada'+(total===1?'':'s')+'</span>'
                : '<span>Aún no hay opiniones publicadas. Comparte tu experiencia.</span>';
              render();
          })
          .catch(function(err){
              summary.textContent='Opiniones temporalmente no disponibles.';
              grid.innerHTML='<div class="mc-review-empty">'+escapeHtml(err.message||'No se pudieron cargar las opiniones.')+'</div>';
          });
    }

    function openModal(){
        msg.className='mc-review-msg';msg.textContent='';
        modal.classList.add('open');modal.setAttribute('aria-hidden','false');document.body.style.overflow='hidden';
    }
    function closeModal(){modal.classList.remove('open');modal.setAttribute('aria-hidden','true');document.body.style.overflow='';}

    section.querySelector('.mc-review-open').addEventListener('click',openModal);
    modal.querySelector('.mc-review-close').addEventListener('click',closeModal);
    modal.addEventListener('click',function(e){if(e.target===modal)closeModal();});
    document.addEventListener('keydown',function(e){if(e.key==='Escape'&&modal.classList.contains('open'))closeModal();});

    nav.addEventListener('click',function(e){
        var btn=e.target.closest('button[data-dir]');if(!btn)return;
        state.page+=btn.dataset.dir==='next'?1:-1;render();
    });

    var resizeTimer=null;
    window.addEventListener('resize',function(){clearTimeout(resizeTimer);resizeTimer=setTimeout(function(){state.page=0;render();},150);});

    form.addEventListener('submit',function(e){
        e.preventDefault();
        msg.className='mc-review-msg';msg.textContent='';
        var submit=form.querySelector('.mc-review-submit');submit.disabled=true;submit.textContent='Enviando...';
        var data=new FormData(form);data.set('csrf',state.csrf);
        fetch(api,{method:'POST',body:data,credentials:'same-origin',headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json'}})
          .then(function(r){return r.json().then(function(body){if(!r.ok||!body.ok)throw new Error(body.message||'No se pudo enviar tu opinión.');return body;});})
          .then(function(body){
              if(body.csrf)state.csrf=body.csrf;
              form.reset();form.querySelector('input[name="csrf"]').value=state.csrf;
              msg.className='mc-review-msg ok';msg.textContent=body.message||'¡Gracias! Tu opinión quedó pendiente de revisión.';
          })
          .catch(function(err){msg.className='mc-review-msg error';msg.textContent=err.message||'No se pudo enviar tu opinión.';})
          .finally(function(){submit.disabled=false;submit.textContent='Enviar calificación';});
    });

    load();
})();
