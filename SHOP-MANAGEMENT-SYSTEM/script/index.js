const sideLines=document.querySelectorAll('.side-line');
const sideLineContainer=document.getElementById('side-line-container');
const sideBar=document.getElementById('side-bar');
function collapseSidebar(){
    sideLines.forEach( line=>{
        line.style.marginRight='7px';
    })
    sideLineContainer.style.left='-35px';
   sideBar.style.width = '0';


}
 
        sideLineContainer.addEventListener('mouseover',()=>{
           sideLines.forEach(line=>{line.style.marginRight='3px';}) 
            sideLineContainer.style.left='270px';
           sideBar.style.width = '250px';

        })
    
           
        
       



sideBar.addEventListener('mouseleave',()=>{
    collapseSidebar();
});

