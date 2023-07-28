{{--<div class="form-group col-4">--}}
    <label for="item">Block</label>
    <br>
    <select name="block_id" id="item" class="form-control">
        @foreach($blocks as $block)
            <option value="{{$block->block}}"
                @selected(old('block_id',(isset($house) ? $house->block_id : null))==$block->id)
            >{{$block->block}}</option>
        @endforeach
    </select>
    @error('block_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
{{--</div>--}}


