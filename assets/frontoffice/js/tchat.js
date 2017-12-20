function getMessage(){

const requeteAjax = new XMLHttpRequest();
        requeteAjax.open('GET', ' tchat_controller.php');
        requeteAjax.onload = function(){

        const resultat = JSON.parse(requeteAjax.responseText);
                const html = resultat.reverse().map(function(message){
        return 
         
 `<div>
    <span class="date">${message.created.at.substring(11,16) }</span>
    <span class="autor">${message.autor}</span>
    <span class="content">${message.content}</span>

 </div> `



        }

        ).join('');
const message= document.querySelector('.messages');

message.innerHTML=html;
message.scrollTop= message.scrollHeight;
        }
requeteAjax.send();
        }
        
        
        function postMessage(){
            event.preventDefault();
            
            const author = document.querySelector('#author');
            const content = document.querySelector('#content');
            
            const data= new FormData();
             data.append('author', author.value);
             data.append('content', content.value);
            
            const requeteAjax = new XMLHttpRequest();
            requeteAjax.open('POST','tchat.php?task=write');
            
            requeteAjax.onload= function(){
                content.value='';
                content.focus();
                getMessages();
            }
           requeteAjax.send(data); 
        }

document.querySelector('form').addEventListener('submit', postMessage);