const body = document.querySelector("body"),
      h100 = body.querySelector(".h-100"),
      title = body.querySelector(".title"),
      infobox = body.querySelector(".card info-box");
      
      var checkbox = document.getElementById("switch");
      checkbox.addEventListener("click", () => {
        body.classList.toggle("dark");
      });
