function select_all() {
    var text_val = document.getElementById('result');
    text_val.focus();
    text_val.select();

    try {
        document.execCommand('copy');
    } catch (err) {
        // Error handling
    }
}







// document.getElementById('calculationForm').addEventListener('submit', function(event) {
//     var previousRotationalValue = document.getElementById('previousRotationalValue').value;
//     var measuredDistance = document.getElementById('measuredDistance').value;
//     var targetDistance = document.getElementById('targetDistance').value;

//     if (!previousRotationalValue || !measuredDistance || !targetDistance) {
//         document.getElementById('errorMessage').textContent = 'Please fill all fields.';
//         event.preventDefault();
//     } else {
//         document.getElementById('errorMessage').textContent = '';
//     }
// });