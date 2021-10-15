<form action="{{ $formUrl }}" method="POST">
    @method($formMethod)
    @csrf

        <label>Company Name</label>
        <input type="text" name="name" required>


        <button type="submit">Save</button>
</form>