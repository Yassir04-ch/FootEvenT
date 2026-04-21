const notif_btn = document.getElementById('notif_btn');
const notif_model = document.getElementById('notif_model');
const close_btn = document.getElementById('close_btn');


notif_btn.addEventListener('click',function(){
    notif_model.classList.remove('hidden');
})

close_btn.addEventListener('click',function(){
    notif_model.classList.add('hidden')
})

console.log('hello');
