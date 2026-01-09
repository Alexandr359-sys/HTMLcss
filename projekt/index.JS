function validateEmail() {
    const email = document.getElementById('emailInput').value;
    const regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
 
    if (!regex.test(email)) {
      document.getElementById('emailError').textContent = 'Neplatný email. Zkuste to znovu.';
      return;
    }
 
    window.userEmail = email;
    document.getElementById('page1').style.display = 'none';
    document.getElementById('page2').style.display = 'block';
  }
 
  const hall = document.getElementById('hall');
const seats = [];
 
/* řada č. 1-11 */
function createRow(rowNum) {
  const row = document.createElement('div');
  row.classList.add('row');
 
  const leftBlock = document.createElement('div');
  leftBlock.style.display = 'flex';
  leftBlock.style.gap = '6px';
 
  const centerBlock = document.createElement('div');
  centerBlock.style.display = 'flex';
  centerBlock.style.gap = '6px';
 
  const rightBlock = document.createElement('div');
  rightBlock.style.display = 'flex';
  rightBlock.style.gap = '6px';
 
  function addSeatsTo(block, count, prefix) {
    for (let i = 1; i <= count; i++) {
      const seat = document.createElement('div');
      seat.classList.add('seat');
      seat.textContent = prefix + rowNum + '-' + i;
 
      if (Math.random() < 0.10) seat.classList.add('reserved');
 
      seat.addEventListener('click', () => {
        if (seat.classList.contains('reserved')) return;
        seat.classList.toggle('selected');
      });
 
      seats.push(seat);
      block.appendChild(seat);
    }
  }
 
  addSeatsTo(leftBlock, 8, 'L');
  addSeatsTo(centerBlock, 12, 'C');
  addSeatsTo(rightBlock, 8, 'R');
 
  row.appendChild(leftBlock);
 
  const aisle1 = document.createElement('div');
  aisle1.style.width = '40px';
  row.appendChild(aisle1);
 
  row.appendChild(centerBlock);
 
  const aisle2 = document.createElement('div');
  aisle2.style.width = '40px';
  row.appendChild(aisle2);
 
  row.appendChild(rightBlock);
 
  hall.appendChild(row);
}
 
/* poslední řada */
function createLastRow() {
  const row = document.createElement('div');
  row.classList.add('row');
  row.style.justifyContent = 'center';
 
  for (let i = 1; i <= 30; i++) {
    const seat = document.createElement('div');
    seat.classList.add('seat');
    seat.textContent = 'F12-' + i;
 
    if (Math.random() < 0.10) seat.classList.add('reserved');
 
    seat.addEventListener('click', () => {
      if (seat.classList.contains('reserved')) return;
      seat.classList.toggle('selected');
    });
 
    seats.push(seat);
    row.appendChild(seat);
  }
 
  hall.appendChild(row);
}
 
/* řady */
for (let r = 1; r <= 11; r++) createRow(r);
createLastRow();
 
  function confirmSeats() {
    const selected = seats.filter(s => s.classList.contains('selected'));
 
    if (selected.length === 0) {
      document.getElementById('output').textContent = 'Nevybral jste žádné místo!';
      return;
    }
 
    const labels = selected.map(s => s.textContent);
 
    selected.forEach(s => { s.classList.remove('selected'); s.classList.add('reserved'); });
 
    document.getElementById('page2').style.display = 'none';
    document.getElementById('page3').style.display = 'block';
 
    document.getElementById('successText').textContent =
      'Rezervace byla úspěšně provedena. Potvrzení bylo odesláno na email: ' + window.userEmail + '. Rezervovaná místa: ' + labels.join(', ');
  }