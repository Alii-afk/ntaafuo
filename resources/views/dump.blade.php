profile.blade

<!-- Term Input -->
<div class="column-6-2  column-6-6 mt-4">
    <x-label class="label-main-2" for="Term" :value="__('Term')" />
    <x-input id="term" class="block mt-1 w-full input-general11 text-center" type="text" name="terms" value="{{$list->terms}}" required />
</div>

<!--Term Input -->
<div class="column-6-2  column-6-6 mt-4">
    <x-label class="label-main-2" for="Term" :value="__('Term')" />
    <x-input id="term" class="block mt-1 w-full input-general11 text-center" type="text" name="terms" required />
</div>


<!-- Sexual Orientation Input -->
<div class="column-6-2 mt-4">
    <x-label class="label-sub label-main" for="sexualOrientation" :value="__('Sexual Orientation')" />
    <x-input id="sexualOrientation" class="block mt-1 w-full input-general" type="text" name="sexualOrientation" value="{{$profilee->sexualOrientation}}" required />
</div>


create-profile
<!-- Sexual Orientation Input -->
<div class="row-main">
    <div class="column-6-2">
        <x-label class="label-sub label-main" for="sexualOrientation" :value="__('Sexual Orientation')" />
        <x-input id="sexualOrientation" class="block mt-1 w-full input-general" type="text" name="sexualOrientation" required autofocus />
    </div>
</div>
                    
