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

      var quillProduct = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                  toolbar: toolbarOptions
            }
      });

      var quillProductInvoice = new Quill('#editor-container-invoice', {
            theme: 'snow',
            modules: {
                  toolbar: toolbarOptions
            }
      });

      document.querySelector('form').onsubmit = function () {
            var productDetails = quillProduct.root.innerHTML;
            var productDetailsInvoice = quillProductInvoice.root.innerHTML;

            document.querySelector('#product-description').value = productDetails;
            document.querySelector('#product-description-invoice').value = productDetailsInvoice;
      };
});

// datatable 
document.addEventListener('DOMContentLoaded', function () {
      const dataTable = new simpleDatatables.DataTable("#datatable");
});

$(document).ready(function () {
      $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true
      });
});

function previewImage(event) {
      const imagePreview = document.getElementById('imagePreview');
      const file = event.target.files[0];

      if (file) {
            const reader = new FileReader();
            reader.onload = function () {
                  imagePreview.src = reader.result;
                  imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
      } else {
            imagePreview.style.display = 'none';
      }
}

function previewImages(event) {
      var files = event.target.files;
      var previewContainer = document.getElementById('imagePreviewContainer');
      previewContainer.innerHTML = ''; // Clear previous previews

      if (files) {
            Array.from(files).forEach(file => {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Selected Image';
                        img.width = 100;
                        img.style.marginRight = '10px';
                        img.style.marginTop = '10px';
                        previewContainer.appendChild(img);
                  };
                  reader.readAsDataURL(file);
            });
      }
}
