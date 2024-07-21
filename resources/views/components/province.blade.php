@php
    $inputName = ($prefix ?? '') . $name;
@endphp

<label for="{{ $inputName }}">{{ $label }}</label>
<select name="{{ $inputName }}" id="province" class="form-select">
    @if (isset($defaultValue))
        <option value="{{ $defaultValue }}">{{ $defautValueDisplay ?? $defaultValue }}</option>
    @endif
    @foreach ($provinces as $province)
        <option value="{{ $province->id }}">{{ $province->name }}</option>
    @endforeach
</select>
<div class="">
    <div class="">
        <label for="{{ $inputName }}-district">District</label>
        <select class="form-select" name="{{ $inputName }}-district" aria-label="Default select example"
            id="district">
            <option selected>Quận/ huyện</option>
        </select>
    </div>
</div>
<div class="">
    <div class="">
        <label for="${{ $inputName }}-wards">Wards</label>
        <select class="form-select" name="{{ $inputName }}-wards" aria-label="Default select example"
            id="ward">
            <option selected>Xã/ phường</option>
        </select>
    </div>
</div>
<script type="text/javascript">
    // Get District by Province id
    $("#province").on('change', function() {
        $value = $(this).val();
        $('#district').html("");
        $('#ward').html("");
        $.ajax({
            type: 'get',
            url: '{{ URL::to('district') }}',
            data: {
                'province': $value
            },
            success: function(data) {
                html = '<option selected>Quận/ huyện</option>';
                for (i = 0; i < data.length; i++) {
                    id = data[i]['id'];
                    name = data[i]['name'];
                    html += "<option value=" + id + ">" + name + "</option>";
                }
                $('#district').append(html);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });

    // Get Wards by district id
    $("#district").on('change', function() {
        $value = $(this).val();
        $('#ward').html("");
        $.ajax({
            type: 'get',
            url: '{{ URL::to('ward') }}',
            data: {
                'district': $value
            },
            success: function(data) {
                html = '<option selected>Xã/ Phường</option>';
                for (i = 0; i < data.length; i++) {
                    id = data[i]['id'];
                    name = data[i]['name'];
                    html += "<option value=" + id + ">" + name + "</option>";
                }
                $('#ward').append(html);
            }
        });
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>
