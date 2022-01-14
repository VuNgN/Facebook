var coll = document.getElementsByClassName("collapsible");

for (var i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "none") {
      content.style.display = "block";
    }
    else {
      content.style.display = "none";
    }
  });
}

var coll2 = document.getElementsByClassName("collapsibleOption");

for (var j = 0; j < coll2.length; j++) {
  coll2[j].addEventListener("click", function() {
    this.classList.toggle("active");
    var contentOption = this.nextElementSibling;
    if (contentOption.style.display === "none") {
      contentOption.style.display = "block";
    }
    else {
      contentOption.style.display = "none";
    }
  });
}



/* var arrPostID = [];
coll3.forEach((btn, index) =>{
  console.log(btn.className.split(' ')[2]);
  arrPostID.push(btn.className.split(' ')[2]);
})
console.log(arrPostID) */

var coll3 = document.querySelectorAll(".btn-comment");
var coll4 = document.querySelectorAll(".comments");

coll3.forEach((btn, index) => {
  btn.addEventListener("click", function(e) {
    this.classList.toggle("active");
    var contentOption = coll4[index];
    if (contentOption.style.display === "none") {
      contentOption.style.display = "block";
    }
    else {
      contentOption.style.display = "none";
    }
  });
}
)

var edit = document.querySelectorAll(".btn-editPost");
var editContent = document.querySelectorAll(".editPost");

edit.forEach((btn, index) => {
  btn.addEventListener("click", function(e) {
    this.classList.toggle("active");
    var contentOption = editContent[index];
    if (contentOption.style.display === "none") {
      contentOption.style.display = "flex";
    }
    else {
      contentOption.style.display = "none";
    }
  });
}
)

var closeEdit = document.querySelectorAll(".editPostCloseBtn");
closeEdit.forEach((btn, index) => {
  btn.addEventListener("click", function(e) {
    this.classList.toggle("active");
    var contentOption = editContent[index];
    if (contentOption.style.display === "none") {
      contentOption.style.display = "flex";
    }
    else {
      contentOption.style.display = "none";
    }
  });
}
)