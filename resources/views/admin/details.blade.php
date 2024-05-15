<x-app-layout>
    <div class="container">
        <div class="row my-2">
            <div class="col-12 d-flex ">
                <a href="{{ route('kurcina') }}" class="btn btn-outline-secondary">Back to panel</a>
                <p class="lead p-0 m-0 d-inline-block mx-auto" style="transform:translateX(-50%);">User ID:<strong>{{ $user->id }}</strong></p>
            </div>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="row my-2 mt-4">
            <div class="col-12">
                <form action="{{ route('save', ['id' => $user->id]) }}" id="userForm" method="post">
                    @csrf
                    @method('patch')


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Role-{{ $user->role->name }}</span>
                        <input name="role_id" value="{{ $user->role_id }}" type="text" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="role_id" required>
                    </div>
                    @if($user->role->name == 'Lawyer')
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Specialization</span>
                        <input name="specialization" value="" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="specialization" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Years of exp</span>
                        <input name="years_exp" value="" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="years_exp" required>
                    </div>
                    @endif
                    <div class="btn-group my-2" role="group" aria-label="buttons group">
                        <button type="button" class="btn btn-outline-secondary" onclick="allowEdit">Edit</button>
                        <button type="submit" class="btn btn-outline-secondary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function allowEdit() {
        const form = document.getElementById('userForm');
        const inputElements = form.getElementsByTagName('input');
        for (let i = 0; i < inputElements.length; i++) {
            inputElements[i].removeAttribute('readonly');
        }
    }
</script>