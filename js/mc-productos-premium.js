document.addEventListener('DOMContentLoaded',()=>{
 const body=document.body,main=document.querySelector('main'); if(!main)return;
 const hero=main.querySelector(':scope > section:first-of-type')||main.querySelector('section');
 if(hero){hero.classList.add('mc-product-hero');if(!hero.querySelector('.mc-hero-glow')){const g=document.createElement('div');g.className='mc-hero-glow';hero.appendChild(g)}}

  
 const candidates=[...main.querySelectorAll('article, details, div[class*="rounded-3xl"], div[class*="rounded-2xl"]')];
 candidates.forEach(el=>{
   if(el.closest('.mc-product-hero'))return;
   const cls=el.className||'';
   if(el.tagName==='ARTICLE'||el.tagName==='DETAILS'||/\bp-[5-9]\b|\bmd:p-[5-9]\b/.test(cls)) el.classList.add('mc-card');
 });

  
 main.querySelectorAll('a[class*="bg-brand-orange"],a[class*="bg-orange"],button[class*="bg-brand-orange"],button[class*="bg-orange"]').forEach(x=>x.classList.add('mc-action'));
 const sections=[...main.querySelectorAll(':scope > section')];
 sections.forEach(sec=>{
   const cta=sec.querySelector('div[class*="bg-gradient-to-r"],div[class*="from-[#052712]"],div[class*="from-[#176b2b]"]');
   if(cta && sec!==hero) cta.classList.add('mc-final-cta');
 });

  
 const reveal=[];
 sections.forEach((sec,si)=>{
   if(sec===hero)return;
   const els=[...sec.querySelectorAll(':scope > div > div, :scope > div > article, h2, .mc-card')];
   els.forEach((el,i)=>{
     if(el.closest('.mc-product-hero'))return;
     el.classList.add('mc-reveal');
     el.style.setProperty('--mc-delay',`${Math.min((i%5)*80,320)}ms`);
     reveal.push(el);
   });
 });
 if('IntersectionObserver'in window){
   const obs=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('mc-visible');obs.unobserve(e.target)}}),{threshold:.10,rootMargin:'0px 0px -30px 0px'});
   [...new Set(reveal)].forEach(el=>obs.observe(el));
 }else{reveal.forEach(el=>el.classList.add('mc-visible'))}

  
 main.querySelectorAll('div[class*="text-center"]').forEach(el=>{if(el.querySelector('[class*="rounded-full"]')&&/0[1-4]/.test(el.textContent))el.classList.add('mc-process-step')});

  
 const fine=window.matchMedia('(pointer:fine)').matches;
 if(fine){
   document.querySelectorAll('.mc-card').forEach(card=>{
     card.addEventListener('pointermove',e=>{
       const r=card.getBoundingClientRect(),x=e.clientX-r.left,y=e.clientY-r.top;
       card.style.setProperty('--mc-x',`${x}px`);card.style.setProperty('--mc-y',`${y}px`);
       const rx=((y/r.height)-.5)*-2.2,ry=((x/r.width)-.5)*2.2;
       card.style.transform=`translateY(-7px) rotateX(${rx}deg) rotateY(${ry}deg)`;
     });
     card.addEventListener('pointerleave',()=>{card.style.transform='';});
   });
 }

  
 let ticking=false;
 const parallax=()=>{if(!hero)return;const y=Math.min(window.scrollY*.10,55);body.style.setProperty('--mc-hero-shift',`${y}px`);ticking=false};
 window.addEventListener('scroll',()=>{if(!ticking){requestAnimationFrame(parallax);ticking=true}},{passive:true});
});
