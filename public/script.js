document.addEventListener('DOMContentLoaded', () => {
    const complaintForm = document.getElementById('complaintForm');
    const anonymousCheckbox = document.getElementById('anonima');
    const contactInfoDiv = document.getElementById('contactInfo');
    const formMessage = document.getElementById('formMessage') || createMessageBox();

    // Esconde/mostra informações de contato baseadas no checkbox de anonimato
    if (anonymousCheckbox && contactInfoDiv) {
        anonymousCheckbox.addEventListener('change', function() {
            if (this.checked) {
                contactInfoDiv.style.display = 'none';
                document.getElementById('nome_denunciante').value = '';
                document.getElementById('email_denunciante').value = '';
            } else {
                contactInfoDiv.style.display = 'block';
            }
        });
    }

    if (complaintForm) {
        complaintForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(complaintForm);

            try {
                const response = await fetch('/api/denuncias', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    let msg = 'Erro ao enviar a denúncia.';
                    try {
                        const err = await response.json();
                        if (err.message) msg = err.message;
                    } catch {}
                    throw new Error(msg);
                }

                const result = await response.json();
                displayMessage('Denúncia enviada com sucesso! Agradecemos sua contribuição.', 'success');
                complaintForm.reset();
                contactInfoDiv.style.display = 'block';
                anonymousCheckbox.checked = false;
            } catch (error) {
                displayMessage(error.message || 'Ocorreu um erro ao enviar sua denúncia. Tente novamente.', 'error');
            }
        });
    }

    function displayMessage(message, type) {
        formMessage.textContent = message;
        formMessage.className = `message-box ${type}`;
        formMessage.style.display = 'block';
        setTimeout(() => {
            formMessage.classList.add('hidden');
            setTimeout(() => formMessage.style.display = 'none', 500);
        }, 5000);
    }

    function createMessageBox() {
        const div = document.createElement('div');
        div.id = 'formMessage';
        div.className = 'message-box hidden';
        complaintForm.parentNode.insertBefore(div, complaintForm.nextSibling);
        return div;
    }
}); 