//JS FOR LOG-OUT
var coll2 = document.getElementsByClassName("account");
var j;

for (j = 0; j < coll2.length; j++) {
  coll2[j].addEventListener("click", function() {
    this.classList.toggle("active");
    var log_out = this.nextElementSibling;
    if (log_out.style.display === "none") {
      log_out.style.display = "flex";   
    } else {
      log_out.style.display = "none";
    }
  });
}
//JS FOR NOTIFY
var coll = document.getElementsByClassName("notifications");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "none") {
      content.style.display = "flex";
    } else {
      content.style.display = "none";
    }
  });
}