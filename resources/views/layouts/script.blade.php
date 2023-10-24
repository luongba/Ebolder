<script type="text/javascript" src="{{ asset('/vendors/jquery/dist/jquery.min.js') }}"></script>

<!-- custome.js -->
<script type="text/javascript" src="{{ asset('/js/demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/app-query.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>

@yield('js')
{{-- <script type="text/javascript" src="{{asset('/js/form-components/form-validation.js')}}"></script> --}}
<script type="text/javascript">
    window.onload = function() {
        let section = document.getElementById('section');
        section && localStorage.setItem('token', section?.value);
        let itemActive = document.querySelectorAll('.mm-active');
        if (itemActive[0].parentElement) {
            if(itemActive[0].parentElement.parentElement && itemActive[0].parentElement.parentElement.className == 'vertical-nav-menu') {
                return;
            }
            itemActive[0].parentElement.parentElement.classList.add('mm-show')
            itemActive[0].parentElement.parentElement.parentElement.classList.add('mm-active')
        }
    }
    let list = document.querySelectorAll('.mm-parent');
    for (let i = 0; i < list.length; i++) {
        list[i].addEventListener('click', function(e) {
            list[i].classList.toggle('mm-active')
            list[i].querySelector('.mm-collapse').classList.toggle('mm-show')
        })
    }
</script>
