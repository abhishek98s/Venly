const modelDestination = document.querySelector('.booking-wrapper');

const iconMenu = document.querySelector('.icon-menu');
const destination = document.querySelector('.nav_items_wrapper');

iconMenu.addEventListener('click', () => {
  destination.classList.toggle('active');
});

$('.logout-btn').on('click', function () {
  $.post('backend/auth/logout.php').done(() => location.reload());
});

function toggleModal() {
  
  const foodPrice = document.querySelector('#food_price').innerHTML;
  const servicePrice = document.querySelector('#service_price').innerHTML;
  const noOfPerson = document.querySelector('#no_of_person').value || 0;
  const capacity = document.querySelector('#capacity').innerHTML || 0;

  console.log(capacity);
  console.log(noOfPerson);

  if(noOfPerson > capacity){
    alert('not capacity');
    return;
  }

  modelDestination.classList.toggle('active');

  const totalPrice =
    parseInt(servicePrice) + parseInt(noOfPerson) * parseInt(foodPrice);
  console.log(
    parseInt(foodPrice),
    parseInt(servicePrice),
    parseInt(noOfPerson)
  );
  document.querySelector('#total_price').innerHTML = 'Rs ' + totalPrice;
}

document.addEventListener('DOMContentLoaded', async function () {
  try {
    const response = fetch(`backend/booking/delete_old.php`, {
      method: 'DELETE',
    })
      .then(() => console.log('ok'))
      .catch(() => console.log('not ok'));

    if (!response.ok) {
      throw new Error('Network response was not ok: ' + error.message);
    }
    const data = await response.text(); // Assuming the PHP script returns a text response
  } catch (error) {
    console.log(error)
  }
});
