function ChangeBlock(nbre){
    console.log(nbre);
    if(nbre==0){
        var actu=document.getElementById("actu");
        actu.style.display="block";
        var cas=document.getElementById("cas");
        cas.style.display="none";
        var OhterNews=document.getElementById("OhterNews");
        OhterNews.style.display="none";
    }if(nbre==1){
        var actu=document.getElementById("actu");
        actu.style.display="none";
        var cas=document.getElementById("cas");
        cas.style.display="block";
        var OhterNews=document.getElementById("OhterNews");
        OhterNews.style.display="none";
    }
    if(nbre==2){
        var actu=document.getElementById("actu");
        actu.style.display="none";
        var cas=document.getElementById("cas");
        cas.style.display="none";
        var OhterNews=document.getElementById("OhterNews");
        OhterNews.style.display="block";
    }
}   