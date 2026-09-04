document.addEventListener('DOMContentLoaded',()=>{
 const body=document.body,main=document.querySelector('main');if(!main)return;
 body.classList.add('mc-ultra-page');
 const sections=[...main.querySelectorAll(':scope > section')];
 const hero=sections[0]||main.querySelector('section');
 if(hero){
   hero.classList.add('mc-ultra-hero');
   if(!hero.querySelector('.mc-aurora')){const a=document.createElement('div');a.className='mc-aurora';hero.appendChild(a)}
   if(!hero.querySelector('.mc-grid')){const g=document.createElement('div');g.className='mc-grid';hero.appendChild(g)}
 }

  
 const tones=['mc-tone-soft','mc-tone-deep','mc-tone-accent','mc-tone-night'];
 sections.slice(1).forEach((sec,i)=>{
   sec.classList.add('mc-tone',tones[i%tones.length]);
   const h2=sec.querySelector('h2');if(h2)h2.classList.add('mc-heading-glow');
 });

  
 const candidates=[...main.querySelectorAll('article,details,div[class*="rounded-3xl"],div[class*="rounded-2xl"]')];
 candidates.forEach(el=>{
   if(el.closest('.mc-ultra-hero'))return;
   const c=String(el.className||'');
   if(el.tagName==='ARTICLE'||el.tagName==='DETAILS'||/\bp-[5-9]\b|\bmd:p-[5-9]\b/.test(c))el.classList.add('mc-ultra-card');
 });
 document.querySelectorAll('.mc-ultra-card').forEach((c,i)=>{if(i%5===0)c.classList.add('mc-featured')});

  
 main.querySelectorAll('a[class*="bg-brand-orange"],a[class*="bg-orange"],button[class*="bg-brand-orange"],button[class*="bg-orange"]').forEach(x=>x.classList.add('mc-ultra-action'));

  
 sections.forEach(sec=>{
   const cta=sec.querySelector('div[class*="bg-gradient-to-r"],div[class*="from-[#052712]"],div[class*="from-[#176b2b]"]');
   if(cta&&sec!==hero)cta.classList.add('mc-ultra-final');
 });

  
 const reveal=[];
 sections.slice(1).forEach((sec,si)=>{
   const els=[...sec.querySelectorAll('h2,h3,.mc-ultra-card,:scope > div > div')];
   [...new Set(els)].forEach((el,i)=>{
     if(el.closest('.mc-ultra-hero'))return;
     el.classList.add('mc-reveal');
     if(i%3===0)el.classList.add('mc-reveal-left'); else if(i%3===1)el.classList.add('mc-reveal-right');
     el.style.setProperty('--mc-delay',`${Math.min((i%6)*70,350)}ms`);reveal.push(el);
   });
 });
 if('IntersectionObserver'in window){
   const ob=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('mc-visible');ob.unobserve(e.target)}}),{threshold:.10,rootMargin:'0px 0px -35px 0px'});
   reveal.forEach(x=>ob.observe(x));
 }else reveal.forEach(x=>x.classList.add('mc-visible'));

  
 main.querySelectorAll('div[class*="text-center"]').forEach(el=>{if(el.querySelector('[class*="rounded-full"]')&&/0[1-4]/.test(el.textContent))el.classList.add('mc-process-step')});

  
 if(window.matchMedia('(pointer:fine)').matches){
   document.querySelectorAll('.mc-ultra-card').forEach(card=>{
     card.addEventListener('pointermove',e=>{const r=card.getBoundingClientRect(),x=e.clientX-r.left,y=e.clientY-r.top;card.style.setProperty('--mc-x',x+'px');card.style.setProperty('--mc-y',y+'px');const rx=((y/r.height)-.5)*-2.2,ry=((x/r.width)-.5)*2.2;card.style.transform=`translateY(-9px) rotateX(${rx}deg) rotateY(${ry}deg)`});
     card.addEventListener('pointerleave',()=>card.style.transform='');
   });
 }

  
 let tick=false;const parallax=()=>{if(hero){body.style.setProperty('--mc-hero-shift',Math.min(window.scrollY*.09,58)+'px')}tick=false};
 addEventListener('scroll',()=>{if(!tick){requestAnimationFrame(parallax);tick=true}},{passive:true});
});
