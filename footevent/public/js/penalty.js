const penaltydiv = document.getElementById('penalty');
const scoreEq1 = document.getElementById('scoreEq1');
const scoreEq2 = document.getElementById('scoreEq2');

function chekscore(){
    if(scoreEq1.value != '' && scoreEq2.value != '' && scoreEq1.value == scoreEq2.value){
        penaltydiv.classList.remove('hidden');
    } else {
        penaltydiv.classList.add('hidden');
    }
}

scoreEq1.addEventListener('input', chekscore);
scoreEq2.addEventListener('input', chekscore);