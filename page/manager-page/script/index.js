function gerarRelatorio(){
    const botao = document.querySelector('#b1');
    const lod =  document.querySelector('.loader');
    const btn = document.querySelector('.btn');
    const grafico = document.querySelector('.img-grafico');   

    setTimeout(()=>{  
     lod.classList.remove('Nvisivel')
    botao.innerHTML = "Carregando"
    botao.classList.add('back')
        setTimeout(()=>{
            lod.classList.add('Nvisivel')
            botao.innerHTML = "Gerar relatório"
            botao.classList.remove('back')
            btn.classList.toggle('visivel') 
            grafico.classList.toggle('visivel') 
            botao.classList.toggle('Nvisivel')
        },2000)
    },1) 
}

function gerarRelatorio2(){  
    const btn2 = document.querySelector('.btn2');
    const grafico2 = document.querySelector('.img-grafico2'); 
    const botao2 = document.querySelector('#b2');  
    const lod2 =  document.querySelector('.loader2');


setTimeout(()=>{
    lod2.classList.remove('Nvisivel')
    botao2.innerHTML = "Carregando"
    botao2.classList.add('back')
    setTimeout(()=>{
        lod2.classList.add('Nvisivel')
        botao2.innerHTML = "Gerar relatório"
        botao2.classList.remove('back')
        btn2.classList.toggle('visivel') 
        grafico2.classList.toggle('visivel')
        botao2.classList.toggle('Nvisivel')},2000)
},1) 
}

function closeRel(){
    const botao = document.querySelector('#b1');
    const lod =  document.querySelector('.loader');
    const btn = document.querySelector('.btn');
    const grafico = document.querySelector('.img-grafico');  

    btn.classList.toggle('visivel');
    grafico.classList.toggle('visivel');
    botao.classList.replace("Nvisivel",'visivel')

}

function closeRel2(){
    const botao2 = document.querySelector('#b2');
    const lod2 =  document.querySelector('.loader2');
    const btn2 = document.querySelector('.btn2');
    const grafico2 = document.querySelector('.img-grafico2');  

    btn2.classList.toggle('visivel');
    grafico2.classList.toggle('visivel');
    botao2.classList.replace("Nvisivel",'visivel')

}

function sair(ex){
    var div = document.getElementById('sair')
    if(ex === 'sair'){
        div.classList.toggle('visivel');
    }
    else if(ex ==='sim'){
        window.location.href = 'method/logout.php';
    }   
     else{
        div.classList.toggle('visivel');
    }
}
 

const botaoPdf = document.getElementById("botao-pdf");
const canvas = document.getElementById("meu-grafico");

botaoPdf.addEventListener("click", () => {
  html2canvas(canvas).then((canvasImagem) => {
    const imagemDataUrl = canvasImagem.toDataURL("image/png");
    const pdf = new jsPDF();
    pdf.addImage(imagemDataUrl, "PNG", 10, 10, 100, 100);
    pdf.save("meu-grafico.pdf");
  });
});

const botaoPdf2 = document.getElementById("botao-pdf2");
const canvas2 = document.getElementById("meu-grafico2");

botaoPdf2.addEventListener("click", () => {
  html2canvas(canvas2).then((canvasImagem) => {
    const imagemDataUrl = canvasImagem.toDataURL("image/png");
    const pdf = new jsPDF();
    pdf.addImage(imagemDataUrl, "PNG", 10, 10, 100, 100);
    pdf.save("meu-grafico2.pdf");
  });
});


function notify(){
    const not = document.querySelector('.notify'); 
    not.classList.toggle('notifyV');
}


function openSet(){
    var setting = document.getElementById('set')
    var notifi = document.getElementById('not')
    var docs = document.getElementById('doc')
    var grafi = document.getElementById('gra')

    setting.classList.toggle('lop')
    notifi.classList.toggle('icon-not')
    docs.classList.toggle('icon-docs')
    grafi.classList.toggle('icon-graf')
    
}

function openSetMob(){
    var setting = document.getElementById('set2')
    setting.classList.toggle('lop')

    var divMob = document.querySelector('.sub-header-mob')
    divMob.classList.toggle('sub-visi')
}
