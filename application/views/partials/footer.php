<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2024 &copy; Polije</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://saugi.me">Claudio</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= base_url('assets/static/js/components/dark.js') ?>"></script>
<script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>


<script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>

<!-- Datatable  -->
<script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/extensions/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?= base_url('assets/static/js/pages/datatables.js') ?>"></script>

<!-- Pnotify -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/2.0.0/pnotify.all.min.js"></script>

<!-- Sweet Alert  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

<!-- Toastr -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    function showNotification(type, msg, desc) {
        toastr[type](desc, msg, {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "2000",
        });
    }

    function confirmAlert(title, text, icon, btnYes, btnNo) {
        return Swal.fire({
            // position: "top-end",
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: btnYes,
            cancelButtonText: btnNo
        })
    }

    function errorAlert(title, text, icon) {
        return Swal.fire({
            title: title,
            text: text,
            icon: icon,
        })
    }

    function alertResult(icon, title) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            showCloseButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: icon,
            title: title
        });
    }

    $(document).ready(function() {
        // new PNotify({
        //     title: false, // Menyembunyikan judul
        //     text: 'Aksi berhasil dilakukan.',
        //     type: 'success',
        //     hide: false,
        //     sticker: false
        // });

        // alertResult();
    })
</script>

</body>

</html>