document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('joueurForm');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', function(e){
        let valid = true;

        const name = document.getElementById('name');
        const poste = document.getElementById('poste');
        const age = document.getElementById('age');

        if(name.value.trim() === ''){
            document.getElementById('errorName').classList.remove('hidden');
            valid = false;
        } else {
            document.getElementById('errorName').classList.add('hidden');
        }

        if(poste.value.trim() === ''){
            document.getElementById('errorPoste').classList.remove('hidden');
            valid = false;
        } else {
            document.getElementById('errorPoste').classList.add('hidden');
        }

        if(age.value < 12 || age.value > 60 || age.value.trim() === ''){
            document.getElementById('errorAge').classList.remove('hidden');
            valid = false;
        } else {
            document.getElementById('errorAge').classList.add('hidden');
        }

        if(!valid){
            e.preventDefault();
            return false;
        }

         submitBtn.disabled = true;
        submitBtn.innerHTML = 'Enregistrement...';
    });
});