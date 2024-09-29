document.addEventListener('DOMContentLoaded', function() {
    const voteButtons = document.querySelectorAll('.vote-btn');
    const detailButtons = document.querySelectorAll('.detail-btn');
    const modal = document.getElementById('voteModal');
    const modal2 = document.getElementById('detailModal');
    const closeModal = document.querySelector('.close');
    const closeModal2 = document.querySelector('.closeDetail');
    const idCandidate = document.getElementById('idCandidate');
    const candidateName = document.getElementById('candidateName');
    const pricePerVote = document.getElementById('pricePerVote');
    const priceValue = document.getElementById('priceValue');
    const namaKandidat = document.getElementById('nama_kandidat');
    const daerahKandidat = document.getElementById('asal_daerah');
    const submitVote = document.getElementById('submitVote');
    const voteCount = document.getElementById('voteCount');
    const voterName = document.getElementById('voterName');
    const voterPhone = document.getElementById('voterPhone');
    const modalImage = document.getElementById('modalImage');
    const totalPrice = document.getElementById('totalPrice');
    const amount = document.getElementById('amount');

    let pricePerVoteValue = 0;

    voteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const candidate = this.getAttribute('data-candidate');
            const image = this.getAttribute('data-image');
            pricePerVoteValue = parseFloat(this.getAttribute('data-price'));
            idCandidate.value = `${id}`;
            candidateName.textContent = `${candidate}`;
            modalImage.src = image;
            priceValue.textContent = pricePerVoteValue;
            updateTotalPrice(); // Update total price when modal opens
            modal.style.display = 'block';
        });
    });

    detailButtons.forEach(button => {
        button.addEventListener('click', function() {
            const candidate = this.getAttribute('data-candidate');
            const daerah = this.getAttribute('data-daerah');
            // pricePerVoteValue = parseFloat(this.getAttribute('data-price'));
            // idCandidate.value = `${id}`;
            namaKandidat.textContent = `${candidate}`;
            daerahKandidat.textContent = `${daerah}`;
            // modalImage.src = image;
            // priceValue.textContent = pricePerVoteValue;
            // updateTotalPrice(); // Update total price when modal opens
            modal2.style.display = 'block';
        });
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    closeModal2.addEventListener('click', function() {
        modal2.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
            modal2.style.display = 'none';
        }
    });

    voteCount.addEventListener('input', updateTotalPrice);

    function updateTotalPrice() {
        const votes = parseInt(voteCount.value, 10);
        const total = votes * pricePerVoteValue;
        totalPrice.textContent = total;
        amount.value = total;
    }

    submitVote.addEventListener('click', function() {
        const votes = voteCount.value;
        const name = voterName.value;
        const phone = voterPhone.value;
        if (!name || !phone || votes < 1) {
            alert('Harap lengkapi semua informasi.');
            return;
        }
        // alert(`Vote ${votes} untuk ${candidateName.textContent}\nNama Pemilih: ${name}\nNomor Telepon: ${phone}\nTotal Harga: ${totalPrice.textContent}`);
        // modal.style.display = 'none';
        // // Reset input fields
        // voterName.value = '';
        // voterPhone.value = '';
        // voteCount.value = 1;
        // totalPrice.textContent = '0';
    });
});
