const form = document.querySelector('form');
const popup = document.querySelector('.popup');
const close = document.querySelector('.close-btn');
const height_input = document.querySelector('.height');
const weight_input = document.querySelector('.weight');



form.addEventListener('submit', function (e) {
  e.preventDefault();
  

  let height = parseInt(height_input.value);
  let weight = parseInt(weight_input.value);

  const bmi_score = document.querySelector('.bmi-score');
  const bmi_text = document.querySelector('.bmi-text');
  let text;

  if (height === '' || height < 0 || isNaN(height)) {
        alert("Please enter a valid height");
        height_input.focus();
  } else if (weight === '' || weight < 0 || isNaN(weight)) {
        alert("Please enter a valid weight");
        weight_input.focus();
  } else {
    const bmi = (weight / ((height * height) / 10000)).toFixed(2);
    
    if (bmi < 25) {
        text = 'You are underweight';
      } else if (bmi >= 25 && bmi < 30) {
        text = 'You are a healthy weight';
      } else {
        text = 'You are overweight';
      }
     
      popup.style.display = 'block';
     
      bmi_score.innerHTML = bmi;
    
      bmi_text.innerHTML = text;
   
      height_input.value = '';
      weight_input.value = '';
      
  }
});


close.addEventListener('click', function (e) {
    popup.style.display = 'none';
});