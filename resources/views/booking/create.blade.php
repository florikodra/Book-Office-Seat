@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Booking Form</h1>


        <form action="" method="post">
            <div class="row mb-5">

            
            <div class="form-group col">
                <label>Choose Company</label>
                <select name="company_id" id="" class="form-control">
                    <option value="">None</option>
                    @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col">
                <label>Choose Office</label>
                <select name="company_id" id="" class="form-control">
                    <option value="">Test</option>
                </select>
            </div>

            <div class="form-group col">
                <label>Choose Date</label>
                <input type="date" name="" id="" class="form-control">
            </div>

            <div class="form-group col">
                <label>Choose seat</label>
                <select name="company_id" id="" class="form-control">
                    <option value="">Test</option>
                </select>
            </div>

            <div class="form-group col">
                <label>Choose Starting Time (08:00 - 16:30)</label>
                <input type="time" name="" id="" class="form-control" min="08:00" max="16:30">
            </div>

            <div class="form-group col">
                <label>Choose Ending Time (08:30 - 17:00)</label>
                <input type="time" name="" id="" class="form-control" min="08:30" max="17:00">

            </div>
        </div>

            <button class="btn btn-success w-100" type="submit">SAVE</button>
        </form>

    </div>
@endsection
