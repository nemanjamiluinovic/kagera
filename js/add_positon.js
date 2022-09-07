function openForm() {
  document.getElementById("popupForm").style.display = "block";
}

function closeForm() {
  document.getElementById("selector").value = "1";
  document.getElementById("popupForm").style.display = "none";
}

var activities = document.getElementById("selector");

activities.addEventListener("change", function() {
  if(activities.value == "add"){
    addActivityItem();
  }
});

function addActivityItem() {
  openForm();
}