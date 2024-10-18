<div class="contactoInmo">

     {{-- Cpmtactos --}}
     <div class="row">
        <div class="col">
            <label for="contactoId">Contacto</label>
            <select name="contactoId" id="contactoId" class="form-control dropdown w-50 text-center bg-light">
                <option value="">Elegir una opción</option>
            </select>
            {{-- Error --}}
            @error('contactoId')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>

</div>
