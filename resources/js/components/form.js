import {openModal, hideAllModals} from './modal.js';

function getData($form) {
    const inputs = Array.from($form.querySelectorAll("input, textarea, select"));
    return inputs.reduce(
        (object, key) => ({ ...object, [key.name]: key.value }),
        {}
    );
};


if( document.getElementsByClassName('vote_form') ){
    let forms = document.getElementsByClassName('vote_form');
    for (let i = 0; i< forms.length; i++) {
        forms[i].addEventListener('submit', async function(e){
            const form = e.target;
            e.preventDefault();
            const responseModal = document.querySelector('#modal-response');
            const responseBlock = document.querySelector('#modal-response .modal-content');
            responseBlock.innerHTML = '';
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
    
            const response = await (
                await fetch(form.getAttribute('action'), {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        "Accept" : "application/json"
                    },
                    body: new FormData(form),
                })
            ).json();
            if(response.success){
                hideAllModals();
                openModal('modal-response');
                responseModal.addEventListener("hideModal", function(event) {
                    window.location.reload();
                });
            }else{
                submitButton.disabled = false;
                hideAllModals();
                openModal('modal-response');
                responseBlock.innerHTML = response.error;
            }
        });
    }
}

if( document.getElementsByClassName('profile_form') ){
    let forms = document.getElementsByClassName('profile_form');
    console.log(forms);
    for (let i = 0; i< forms.length; i++) {
        forms[i].addEventListener('submit', async function(e){
            const form = e.target;
            e.preventDefault();
            const responseModal = document.querySelector('#modal-response');
            const responseBlock = document.querySelector('#modal-response .modal-content');
            responseBlock.innerHTML = '';
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;

            let inputs = e.target.getElementsByClassName('input-error');
            
            let inputsError = e.target.getElementsByClassName('feedback-error');

            for (let i = 0; i < inputs.length; i++){
                inputs[i].classList.remove("input-error");
            }
            for (let i = 0; i < inputsError.length; i++){
                inputsError[i].classList.add('hidden');
                inputsError[i].querySelector('span').innerHTML ='';
            }
    
            const response = await (
                await fetch(form.getAttribute('action'), {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        "Accept" : "application/json"
                    },
                    body: new FormData(form),
                })
            ).json();
            if(response.success){
                hideAllModals();
                openModal('modal-response');
                responseBlock.innerHTML = response.success;
                responseModal.addEventListener("hideModal", function(event) {
                    window.location.reload();
                });
            }
            else if(response.errors){
                for(let key in response.errors){

                    if(e.target.querySelector('input[name="'+ key +'"]')){
                        e.target.querySelector('input[name="'+ key +'"]').classList.add('input-error');
                    }
                    
                    let fieldError = e.target.querySelector('#' + key + '-error');
                    if(fieldError){
                        fieldError.classList.remove('hidden');
                        fieldError.querySelector('span').innerHTML = response.errors[key];
                    }

                    submitButton.disabled = false;
                }
            }
            
            else{
                submitButton.disabled = false;
                hideAllModals();
                openModal('modal-response');
                responseBlock.innerHTML = response.error;
            }
        });
    }
}


