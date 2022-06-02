function increaseValue() {
  var value = parseInt(document.getElementById('cred-number').value, 10);
  value = isNaN(value) ? 0 : value;
  value+=5;
  document.getElementById('cred-number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('cred-number').value, 10);
  value = isNaN(value) ? 0 : value;
  value-=5;
  document.getElementById('cred-number').value = value;
}

function bookdis(){
  document.getElementById("book_isbn_result").style.display = "none";
}

function uiddis(){
  document.getElementById("user_unique_id_result").style.display = "none";
}

function bookapp(){
  document.getElementById("book_isbn_result").style.display = "block";
}

function uidapp(){
  document.getElementById("user_unique_id_result").style.display = "block";
}

function get_creds(){
  return document.getElementById("cred-number").textContent
}