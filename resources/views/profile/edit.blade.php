
<x-app-layout>
    <div class="container mb-5">
        <div class="row my-4">
            <div class="col-12 text-center">
                <h6 class="display-6">Settings</h6>
            </div>
        </div>    
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
@if (session('status') === 'profile-updated') <?php // NAPRAVITI DA NA USPJESAN APDEJT SE AKTIVIRA ?>
    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnTrigger">Launch modal</button>
    <div class="modal modal-sm fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  bg-success bg-opacity-10 border-1 border-success">
                    <h1 class="modal-title fs-6" id="exampleModalLabel">Profile updated</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>  
<script>

    document.getElementById('btnTrigger').addEventListener('load', function(){
        triggerMe(this);
    });
    
    function triggerMe(e){
        e.click()
    }

</script> 
@endif
</x-app-layout>


