// const requireInputElements = document.querySelectorAll(
//   ".modal-body .form-control"
// );
// const checkboxBtnElements = document.querySelectorAll(".gender-checkbox");

// requireInputElements.forEach((element) => {
//   element.addEventListener("blur", () => {
//     if (!element.value) {
//       element.style.border = "1px solid red";
//     } else {
//       element.style.border = "1px solid #ced4da";
//     }
//   });
// });

// checkboxBtnElements.forEach((element) => {
//   element.addEventListener("click", (e) => {
//     if (e.target.localName === "div") e.target.lastElementChild.checked = true;
//   });
// });

$(document).ready(function () {
  $(".modal-body .form-control").each(function (index, element) {
    $(element).blur(function () {
      if (!$(element).val()) {
        $(element).css({ border: "1px solid red" });
      } else {
        $(element).css({ border: "1px solid #ced4da" });
      }
    });
  });
  $(".gender-checkbox").click(function (e) {
    if (e.target.localName === "div") e.target.lastElementChild.checked = true;
  });
});
