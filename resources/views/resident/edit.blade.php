<div class="modal-body">
    <h5 class="text-center fw-bold">Edit Vehicle Record</h5>

    <form action="{{ route('resident.update', [$value->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row mt-5 mb-3">
            <div class="col-6">

                <label for="id">Matric Number</label>
                <input type="text" name="id" class="form-control" value="{{ old('id', $value->id) }}" required>
            </div>
            <div class="col-6">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $value->name) }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="faculty">Faculty</label>
                <input type="text" name="faculty" class="form-control" value="{{ old('faculty', $value->faculty) }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">

                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $value->phone) }}"
                    required>
            </div>
            <div class="col-6">
                <label for="roomNumber">Room Number</label>
                <input type="text" name="roomNumber" class="form-control"
                    value="{{ old('roomNumber', $value->roomNumber) }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">

                <label for="plateNumber">Car Plate
                    Number</label>
                <input type="text" name="plateNumber" class="form-control"
                    value="{{ old('plateNumber', $value->plateNumber) }}" required>
            </div>
            <div class="col-4">
                <label for="carType">Vehicle Type</label>
                <input type="text" name="carType" class="form-control" value="{{ old('carType', $value->carType) }}">
            </div>
            <div class="col-4">
                <label for="carColour">Vehicle Colour</label>
                <input type="text" name="carColour" class="form-control"
                    value="{{ old('carColour', $value->carColour) }}">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary col-6 offset-3 submit-record">Submit</button>
        </div>
    </form>
</div>
{{-- <div class="modal-body">
    <h5 class="text-center fw-bold">Edit Vehicle Record</h5>

    <form action="#" method="post">
        @method('PUT')
        @csrf
        <div class="row mt-5 mb-3">
            <div class="col-6">

                <label for="id">Matric Number</label>
                <input type="text" name="id" class="form-control" value="{{ old('id', '') }}" required>
            </div>
            <div class="col-6">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', '') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="faculty">Faculty</label>
                <input type="text" name="faculty" class="form-control" value="{{ old('faculty', '') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">

                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', '') }}" required>
            </div>
            <div class="col-6">
                <label for="roomNumber">Room Number</label>
                <input type="text" name="roomNumber" class="form-control" value="{{ old('roomNumber', '') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">

                <label for="plateNumber">Car Plate
                    Number</label>
                <input type="text" name="plateNumber" class="form-control" value="{{ old('plateNumber', '') }}"
                    required>
            </div>
            <div class="col-4">
                <label for="carType">Vehicle Type</label>
                <input type="text" name="carType" class="form-control" value="{{ old('carType', '') }}">
            </div>
            <div class="col-4">
                <label for="carColour">Vehicle Colour</label>
                <input type="text" name="carColour" class="form-control" value="{{ old('carColour', '') }}">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary col-6 offset-3 submit-record">Submit</button>
        </div>
    </form>
</div> --}}
