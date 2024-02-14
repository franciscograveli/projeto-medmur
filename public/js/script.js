

document.addEventListener("DOMContentLoaded", function() {

    const avatar = document.getElementById('avatar');
    const title = document.getElementById('title');
    const name = document.getElementById('name');
    const actions = document.getElementById('actions');
    const logoutButton = document.getElementById('logoutButton');
    const email = document.getElementById('email');
    const desc = document.getElementById('desc');
    const loader = document.getElementById('loader');

    logoutButton.addEventListener('click', function() {
        console.log('Saindo...');
        location.href = './logout';
    });

    function getUserDetails() {
        fetch('./', {
            method: 'POST', // Especifica o método como POST
            headers: {
                'Content-Type': 'application/json' // Especifica o tipo de conteúdo como JSON
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('aqui Erro ao buscar detalhes do usuário: ' + response.statusText);
                }
                return response.json();
            })
            .then(user => {
                displayUserDetails(user);
            })
            .catch(error => {
                console.error('Erro ao buscar detalhes do usuário:', error);
            });
    }
    
    
    function displayUserDetails(user) {
        email.addEventListener('click', function() {
            window.open(`mailto:${user.email}`, '_blank');
        });
        desc.textContent = user.email;
        avatar.style.backgroundImage  = `url(${user.avatar})`;
        name.textContent = user.name;
        loader.style.display = 'none';
    }
    getUserDetails();
});
