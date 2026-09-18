(function(){
  'use strict';
  var input=document.getElementById('news-photos'),gallery=document.getElementById('gallery-preview'),order=document.getElementById('gallery-order'),removed=document.getElementById('removed-fields');
  if(!input||!gallery||!order)return;
  var newUrls=[];
  function sync(){order.value=Array.from(gallery.querySelectorAll('.gallery-admin-item:not(.is-removed)')).map(function(el){return el.dataset.token;}).join(',');}
  function bind(item){
    item.addEventListener('dragstart',function(){item.classList.add('dragging');});
    item.addEventListener('dragend',function(){item.classList.remove('dragging');sync();});
    var removeExisting=item.querySelector('.remove-existing');
    if(removeExisting)removeExisting.addEventListener('click',function(){item.classList.add('is-removed');var hidden=document.createElement('input');hidden.type='hidden';hidden.name='remove_images[]';hidden.value=removeExisting.dataset.id;removed.appendChild(hidden);sync();});
  }
  gallery.querySelectorAll('.gallery-admin-item').forEach(bind);
  gallery.addEventListener('dragover',function(e){e.preventDefault();var moving=gallery.querySelector('.dragging');if(!moving)return;var target=Array.from(gallery.querySelectorAll('.gallery-admin-item:not(.dragging):not(.is-removed)')).find(function(el){var r=el.getBoundingClientRect();return e.clientY<r.top+r.height/2&&e.clientX<r.right;});gallery.insertBefore(moving,target||null);});
  input.addEventListener('change',function(){
    gallery.querySelectorAll('[data-token^="n:"]').forEach(function(el){el.remove();});newUrls.forEach(URL.revokeObjectURL);newUrls=[];
    Array.from(input.files).forEach(function(file,index){var url=URL.createObjectURL(file);newUrls.push(url);var item=document.createElement('figure');item.className='gallery-admin-item';item.draggable=true;item.dataset.token='n:'+index;item.innerHTML='<img alt="Vista previa"><figcaption><span class="drag-handle">☰ Arrastrar</span><button type="button" class="remove-new">Quitar</button></figcaption>';item.querySelector('img').src=url;item.querySelector('.remove-new').addEventListener('click',function(){var files=Array.from(input.files);files.splice(index,1);var dt=new DataTransfer();files.forEach(function(f){dt.items.add(f);});input.files=dt.files;input.dispatchEvent(new Event('change'));});gallery.appendChild(item);bind(item);});sync();
  });
  document.getElementById('news-form').addEventListener('submit',function(e){sync();if(!gallery.querySelector('.gallery-admin-item:not(.is-removed)')){e.preventDefault();alert('Debes agregar por lo menos una foto a la noticia.');}});
  sync();
})();
