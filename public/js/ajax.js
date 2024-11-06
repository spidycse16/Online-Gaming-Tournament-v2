function ajax()
{
   const xhr=new XMLHttpRequest();
   xhr.open('get','http://localhost:8000/blog-test',true);
   xhr.onload=function()
   {
    if(this.status===200)
    {
        const data=JSON.parse(this.responseText);
        //document.write(data);
        printHtml(data);
    }
   }
   xhr.send();
}
function printHtml(data)
{
    const pusher=document.getElementById('test');
    pusher.innerHTML=`<p>${data.tournament_name}</p>`;
}
