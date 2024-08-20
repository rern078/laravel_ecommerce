document.addEventListener('DOMContentLoaded', function () {
      var toolbarOptions = [
            [{ 'font': [] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction
            [{ 'align': [] }],
            ['link', 'image', 'video', 'blockquote', 'code-block'],
            ['clean']                                         // remove formatting button
      ];

      document.querySelector('form').onsubmit = function () {
            document.querySelector('#product-description').value = quill.root.innerHTML;
      };

      document.querySelector('form').onsubmit = function () {
            document.querySelector('#product-description-invoice').value = quill.root.innerHTML;
      };

      var quill = new Quill('#editor-container', {
            theme: 'snow',  // or 'bubble'
            modules: {
                  toolbar: toolbarOptions
            }
      });
      var quill = new Quill('#editor-container-invoice', {
            theme: 'snow',  // or 'bubble'
            modules: {
                  toolbar: toolbarOptions
            }
      });

});

// datatable 
document.addEventListener('DOMContentLoaded', function () {
      const dataTable = new simpleDatatables.DataTable("#datatable");
});

// $(document).ready(function () {
//       $('#datatable').DataTable({
//             dom: 'Bfrtip',
//             buttons: [
//                   'copy', 'csv', 'excel', 'pdf', 'print'
//             ]
//       });
// });
$(document).ready(function () {
      $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true
      });
});