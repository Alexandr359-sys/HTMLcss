function validateEmail() {
    const email = document.getElementById('emailInput').value;
    const regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    if (!regex.test(email)) {
        document.getElementById('emailError').textContent = 'Zadejte prosím platnou e-mailovou adresu.';
        return;
    }

    window.userEmail = email;
    document.getElementById('page1').style.display = 'none';
    document.getElementById('page2').style.display = 'block';
}

const hall = document.getElementById('hall');
const seats = [];

function createRow(rowNum) {
    const row = document.createElement('div');
    row.classList.add('row');

    const leftBlock = document.createElement('div');
    leftBlock.style.display = 'flex'; leftBlock.style.gap = '6px';

    const centerBlock = document.createElement('div');
    centerBlock.style.display = 'flex'; centerBlock.style.gap = '6px';

    const rightBlock = document.createElement('div');
    rightBlock.style.display = 'flex'; rightBlock.style.gap = '6px';

    function addSeatsTo(block, count, prefix) {
        for (let i = 1; i <= count; i++) {
            const seat = document.createElement('div');
            seat.classList.add('seat');
            seat.title = `${prefix}${rowNum}-${i}`; // Zobrazí číslo při najetí myší

            if (Math.random() < 0.15) seat.classList.add('reserved');

            seat.addEventListener('click', () => {
                if (seat.classList.contains('reserved')) return;
                seat.classList.toggle('selected');
            });

            seats.push(seat);
            block.appendChild(seat);
        }
    }

    addSeatsTo(leftBlock, 4, 'L');
    addSeatsTo(centerBlock, 10, 'C');
    addSeatsTo(rightBlock, 4, 'R');

    row.appendChild(leftBlock);
    const aisle1 = document.createElement('div'); aisle1.style.width = '30px';
    row.appendChild(aisle1);
    row.appendChild(centerBlock);
    const aisle2 = document.createElement('div'); aisle2.style.width = '30px';
    row.appendChild(aisle2);
    row.appendChild(rightBlock);

    hall.appendChild(row);
}

// Generování 10 řad
for (let r = 1; r <= 10; r++) createRow(r);

function confirmSeats() {
    const selected = seats.filter(s => s.classList.contains('selected'));

    if (selected.length === 0) {
        document.getElementById('output').textContent = 'Prosím, vyberte si alespoň jedno sedadlo.';
        return;
    }

    const labels = selected.map(s => s.title);

    document.getElementById('page2').style.display = 'none';
    document.getElementById('page3').style.display = 'block';

    document.getElementById('successText').innerHTML = 
        `Vaše místa (<strong>${labels.join(', ')}</strong>) byla rezervována.<br>Potvrzení jsme zaslali na: <strong>${window.userEmail}</strong>`;
}
