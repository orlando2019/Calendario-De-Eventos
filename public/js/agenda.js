document.addEventListener("DOMContentLoaded", function () {
   let formulario = document.querySelector("form");

   var calendarEl = document.getElementById("agenda");

   var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: "dayGridMonth",
      locale: "es",
      timeZone: "America/Bogota",
      themeSystem: "bootstrap",

      headerToolbar: {
         left: "prev,next today",
         center: "title",
         right: "dayGridMonth timeGridWeek,listWeet",
      },
      events: "http://localhost/agenda/public/eventos/mostrar",

      dateClick: function (info) {
         var check = info.dateStr;
         var today = moment(new Date()).format("YYYY-MM-DD");
         //console.log("clicked " + "Checkk=" + check + " Today=" + today);

         if (check >= today) {
            formulario.reset();
            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;
            $("#evento").modal("show");
         } else {
            alert("!No se pueden crear eventos en el pasado!");
         }
      },

      eventClick: function (info) {
         var evento = info.event;
         //console.log(evento);

         axios
            .post("http://localhost/agenda/public/eventos/editar/" + evento.id)
            .then((repuesta) => {
               formulario.id.value = repuesta.data.id;
               formulario.title.value = repuesta.data.title;
               formulario.descripcion.value = repuesta.data.descripcion;
               formulario.start.value = repuesta.data.start;
               formulario.end.value = repuesta.data.end;
               $("#evento").modal("show");
            })
            .catch((error) => {
               if (error.response) {
                  console.log(error.response.data);
               }
            });
      },
   });

   calendar.render();

   document.getElementById("btnGuardar").addEventListener("click", function () {
      const Star = formulario.start.value;
      const End = formulario.end.value;
      const today = moment(new Date()).format("YYYY-MM-DD");
      //console.log(Star, End, today);

      //IF NORMAL
      if (End < Star) {
         alert("!ERROR! La Fecha final No Puede Ser Menor A La Fecha Inicial");
      } else if (Star < today) {
         alert("!No se pueden crear eventos en el pasado!!!!!");
      } else {
         //enviarDatos("http://localhost/agenda/public/eventos/agregar");
      }
   });

   document
      .getElementById("btnEliminar")
      .addEventListener("click", function () {
         enviarDatos(
            "http://localhost/agenda/public/eventos/eliminar/" +
               formulario.id.value
         );
      });

   function enviarDatos(url) {
      const datos = new FormData(formulario);

      axios
         .post(url, datos)
         .then((repuesta) => {
            calendar.refetchEvents();
            $("#evento").modal("hide");
         })
         .catch((error) => {
            if (error.response) {
               console.warn(error.response.data);
            }
         });
   }

   (function () {
      "use strict";
      var forms = document.querySelectorAll(".needs-validation");
      Array.prototype.slice.call(forms).forEach(function (form) {
         form.addEventListener(
            "submit",
            function (event) {
               if (!form.checkValidity()) {
                  event.preventDefault();
                  event.stopPropagation();
               }

               form.classList.add("was-validated");
            },
            false
         );
      });
   })();
});
