<x-app-layout>
    <x-slot name="header">
        <div class="text-green pt-8">
            <!-- Application Logo -->
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>

            <!-- Create a profile -->
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <span class="landing-button-2 pt-4 mt-10 mb-4">Create a profile</span>
            </div>

            <!-- Introduction Text -->
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <span class="tag-2-line w-tag mb-8">Join Ghana’s only and largest Apartment-share community
                    we are thrilled to have you on-board</span>
            </div>
        </div>

    </x-slot>
    <div class="w-80">
        <!-- Register User Form -->
        <form method="POST" action="{{ route('profile.store') }}" class="login-form" enctype="multipart/form-data">
            @csrf

            <!-- Image Upload -->
            <div class="row-main">
                <div class="column-9">
                    <label for="profileImage" class="image-preview-label image-preview">
                        <div id="profileImagePreview" class="image-preview">
                            <img src="" alt="Profile Image" class="preview-image">
                        </div>
                    </label>
                    <input id="profileImage" type="file" name="profilePicture" class="hidden-file-input" style="display: block; opacity: 0; margin: auto;" accept="image/*" required />
                </div>
            </div>

            <!-- Describe Yourself in Tags -->
            <div class="row-main">
                <div class="column-9 mb-4">
                    <x-label for="profileImage" class="upload-image-text" :value="__('Upload Image')" />
                </div>
            </div>


            <!-- Describe Yourself in Tags -->
            <div class="row-main">
                <div>
                    <x-label class="Charteristics" for="Charteristics" :value="__('Describe yourself in tags')" />
                </div>
            </div>

            <!-- Display Validation Errors -->
            @if ($errors->any())
            <div class="row-main">
                <div class="column-6">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            @if($errors->has('failed'))
            <div class="row-main">
                <div class="column-6">
                    <div class="alert alert-danger">
                        {{ $errors->first('failed') }}
                    </div>
                </div>
            </div>
            @endif

            <!-- Charteristics -->
            <div class="row-main">
                <!-- First Tag -->
                <div class="column-4">
                    <select name="tagOne" id="tagOne" class="block mt-1 w-full drop-tag " required autofocus>
                        <option value="">DropDown</option>
                        <option value="Movie buff">Movie buff</option>
                        <option value="Snapchatter">Snapchatter</option>
                        <option value="Sportfan">Sportfan</option>
                        <option value="Creative">Creative</option>
                        <option value="Foodie">Foodie</option>
                        <option value="Homebody">Homebody</option>
                        <option value="Tweeter">Tweeter</option>
                        <option value="Explorer">Explorer</option>
                        <option value="Bookworm">Bookworm</option>
                        <option value="Techy">Techy</option>
                        <option value="Gamer">Gamer</option>
                    </select>
                </div>
                <!-- Second Tag -->
                <div class="column-4">
                    <select name="tagTwo" id="tagTwo" class="block mt-1 w-full drop-tag" required autofocus>
                        <option value="">DropDown</option>
                        <option value="Chatterbox">Chatterbox</option>
                        <option value="Neatfreak">Neatfreak</option>
                        <option value="Freedom Fighter">Freedom Fighter</option>
                        <option value="Feminist">Feminist</option>
                        <option value="Free spirited">Free spirited</option>
                        <option value="Political Enthusiast">Political Enthusiast</option>
                        <option value="Religious">Religious</option>
                        <option value="Girly">Girly</option>
                        <option value="Shy">Shy</option>
                        <option value="Grumpy">Grumpy</option>
                        <option value="Unsociable">Unsociable</option>
                        <option value="Cool">Cool</option>
                    </select>
                </div>
                <!-- Third Tag -->
                <div class="column-4">
                    <select name="tagThree" id="tagThree" class="block mt-1 w-full drop-tag" required autofocus>
                        <option value="">DropDown</option>
                        <option value="Student">Student</option>
                        <option value="Professional">Professional</option>
                        <option value="Entrepreneur">Entrepreneur</option>
                        <option value="Influencer">Influencer</option>
                        <option value="Blogger">Blogger</option>
                        <option value="Make up Artis">Make up Artistt</option>
                        <option value="Event Planner">Event Planner</option>
                        <option value="Nurse/Doctor">Nurse/Doctor</option>
                        <option value="Designer">Designer</option>
                        <option value="Cook/Chef">Cook/Chef</option>
                        <option value="Farmer">Farmer</option>
                        <option value="IT">IT</option>
                    </select>
                </div>
            </div>

            <!-- Personal Details -->
            <div class="row-main-2 mt-4 mb-4">
                <div>
                    <x-label class="Personal mt-10 mb-8" for="Personal" :value="__('Personal Details')" />
                </div>
            </div>
            
            <!-- First Name and Last Name Inputs -->
            <div class="row-main-2">
                <div class="column-4-1 pr-4">
                    <x-label class="label-sub label-main" for="firstName" :value="__('First Name')" />
                    <x-input id="firstName" class="block mt-1 w-full input-sub" type="text" name="firstName" required autofocus />
                </div>
                <div class="column-4-1">
                    <x-label class="label-sub" for="lasttName" :value="__('Last Name')" />
                    <x-input id="lasttName" class="block mt-1 w-full input-sub" type="text" name="lastName" required autofocus />
                </div>
            </div>

            <!-- Telephone Number Input -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label class="label-sub label-main" for="telephoneNo" :value="__('Telephone Number')" />
                    <x-input id="telephoneNo" class="block mt-1 w-full input-general telephone-input" type="tel" name="telephoneNo" placeholder="(+233) 000 000 0000" required autofocus />
                </div>
            </div>
            <!-- Date of Birth -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label class="label-sub label-main" for="dateOfBirth" :value="__('Date of Birth')" />
                    <x-input id="dateOfBirth" class="block mt-1 w-full input-general" type="date" min="{{ date('Y-m-d', strtotime('1960-01-01')) }}" max="{{ date('Y-m-d', strtotime('-16 years')) }}" name="dateOfBirth" required autofocus />
                </div>
            </div>

            <!-- Gender Select Box -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label for="gender" class="label-sub label-main mt-2" :value="__('Gender')" />
                    <select name="gender" id="gender" class="block mt-1 w-full input-general text-center" required autofocus>
                        <option value="">- Select Gender -</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            
            <!-- Sexual Orientation Input -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label for="sexualOrientation" class="label-sub label-main mt-2" :value="__('Sexual Orientation')" />
                    <select name="sexualOrientation" id="sexualOrientation" class="block mt-1 w-full input-general text-center" required autofocus>
                        <option value="">- Select Sexual Orientation -</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <!-- Where Would You Like to Stay? -->
            <div class="row-main-2 mt-4 mb-4">
                <div class="column-9">
                    <x-label class="Personal mt-10" for="Personal" :value="__('Where would you like to stay?')" />
                </div>
            </div>

            <!-- City Select Box -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label for="city" class="label-main-2 mt-2" :value="__('City')" />
                    <select name="city" id="city" class="block mt-1 w-full input-general text-center" required autofocus>
                        <option value="">- Select City -</option>
                        <option value="Accra">Accra</option>
                        <option value="Kumasi">Kumasi</option>
                    </select>
                </div>
            </div>

            <!-- Towns Select Box -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label for="Towns" class="label-main-2 mt-2" :value="__('Towns')" />
                    <select name="town" id="town" class="block mt-1 w-full input-general text-center" required autofocus>
                        <option value="">- Select City First -</option>
                    </select>
                </div>
            </div>

            <!-- Social -->
            <div class="row-main-2 mt-4 mb-4">
                <div class="column-6">
                    <x-label class="Personal mt-10" for="Personal" :value="__('Social')" />
                </div>
            </div>

            <!-- Instragram -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label class="label-sub label-main" for="Instragram" :value="__('Instragram')" />
                    <x-input id="socialOne" class="block mt-1 w-full input-general" type="text" name="socialOne" required autofocus />
                </div>
            </div>

            <!-- Tiktok -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label class="label-sub label-main" for="Tiktok" :value="__('Tiktok')" />
                    <x-input id="socialTwo" class="block mt-1 w-full input-general" type="text" name="socialTwo" required autofocus />
                </div>
            </div>

            <!-- Ambassador -->
            <div class="row-main-2 ">
                <div class="column-10 mt-4 mb-4">
                    <label for="brandAmbassador" class="inline-flex items-center">
                        <input id="brandAmbassador" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="brandAmbassador">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Are you interested in becoming a brand ambassador and earn commission') }}</span>
                    </label>
                </div>
            </div>

            <!-- Refer a friend -->
            <!-- <div class="row-main">
                <div class="column-6-2">
                    <x-label class="label-sub label-main-3 mt-4" for="referal" :value="__('Refer a friend')" /> -->
            <x-input id="referal" class="block mt-1 w-full input-general" type="hidden" name="referal" value="autogenerated" required autofocus />
            <!-- </div>
            </div> -->

            <!-- Create User Button -->
            <div class="row-main">
                <div class="column-6-2 mt-8">
                    <x-button class="w-100">
                        {{ __('Create User') }}
                    </x-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>