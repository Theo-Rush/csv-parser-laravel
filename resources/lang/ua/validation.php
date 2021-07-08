<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute має бути accepted.',
    'active_url' => ':attribute не є коректним URL.',
    'after' => ':attribute має бути датою після :date.',
    'after_or_equal' => ':attribute має бути датою після :date включно.',
    'alpha' => ':attribute може містити лише літери.',
    'alpha_dash' => ':attribute може містити лише літери, цифри, дефіс і нижню риску.',
    'alpha_num' => ':attribute може містити лише літери та цифри.',
    'array' => ':attribute має бути масивом.',
    'before' => ':attribute має бути датою до :date.',
    'before_or_equal' => ':attribute має бути датою до :date включно.',
    'between' => [
        'numeric' => ':attribute має бути у проміжку від :min до :max.',
        'file' => ':attribute має бути у проміжку від :min до :max кілобайт.',
        'string' => ':attribute має бути у проміжку від :min до :max символів.',
        'array' => ':attribute має містити від :min до :max елементів.',
    ],
    'boolean' => 'Поле :attribute може приймати значення true або false.',
    'confirmed' => ':attribute не збігається з полем підтвердження.',
    'date' => ':attribute не є коректною датою.',
    'date_equals' => ':attribute має бути датою, що дорівнює :date.',
    'date_format' => 'Формат :attribute має збігатися з :format.',
    'different' => ':attribute і :other повинні відрізнятися.',
    'digits' => ':attribute має містити :digits цифр.',
    'digits_between' => ':attribute має бути у проміжку від :min до :max цифр.',
    'dimensions' => ':attribute має некоректні розміри зображення.',
    'distinct' => 'Значення :attribute дублює інше поле.',
    'email' => ':attribute має бути коректною електронною адресою.',
    'ends_with' => ':attribute має закінчуватись на: :values.',
    'exists' => 'Вибраний :attribute не є коректним.',
    'file' => ':attribute має бути файлом.',
    'filled' => ':attribute не має бути пустим.',
    'gt' => [
        'numeric' => ':attribute має бути більшим ніж :value.',
        'file' => ':attribute має бути більшим ніж :value кілобайт.',
        'string' => ':attribute має бути більшим ніж :value символів.',
        'array' => ':attribute має містити більше ніж :value елементів.',
    ],
    'gte' => [
        'numeric' => ':attribute має бути не меншим ніж :value.',
        'file' => ':attribute має бути не меншим ніж :value кілобайт.',
        'string' => ':attribute має бути не меншим ніж:value символів.',
        'array' => ':attribute має містити не менш ніж :value елементів.',
    ],
    'image' => ':attribute має бути зображенням.',
    'in' => 'Вибраний :attribute не є коректним.',
    'in_array' => ':attribute має міститися у :other.',
    'integer' => ':attribute має бути цілим числом.',
    'ip' => ':attribute має бути коректною IP-адресою.',
    'ipv4' => ':attribute має бути коректною IPv4 адресою.',
    'ipv6' => ':attribute має бути коректною IPv6 адресою.',
    'json' => ':attribute має бути коректним рядком JSON.',
    'lt' => [
        'numeric' => ':attribute має бути меншим ніж :value.',
        'file' => ':attribute має бути меншим ніж :value кілобайт.',
        'string' => ':attribute має бути меншим ніж :value символів.',
        'array' => ':attribute має містити менш ніж :value елементів.',
    ],
    'lte' => [
        'numeric' => ':attribute має бути не більше ніж :value.',
        'file' => ':attribute має бути не більше ніж :value кілобайт.',
        'string' => ':attribute має бути не більше ніж :value символів.',
        'array' => ':attribute має містити не більше ніж :value елементів.',
    ],
    'max' => [
        'numeric' => ':attribute не має перевищувати :max.',
        'file' => ':attribute не має перевищувати :max кілобайт.',
        'string' => ':attribute не має перевищувати :max символів.',
        'array' => ':attribute не має містити понад :max items.',
    ],
    'mimes' => ':attribute має бути файлом типу: :values.',
    'mimetypes' => ':attribute має бути файлом типу: :values.',
    'min' => [
        'numeric' => ':attribute має бути принаймні :min.',
        'file' => ':attribute має бути принаймні :min кілобайт.',
        'string' => ':attribute має бути принаймні :min символів.',
        'array' => ':attribute має містити принаймні :min елементів.',
    ],
    'not_in' => 'Вибраний :attribute не є коректним.',
    'not_regex' => 'Формат :attribute не є коректним.',
    'numeric' => ':attribute має бути числом.',
    'password' => 'Пароль не є коректним.',
    'present' => 'Поле :attribute не має бути пустим.',
    'regex' => 'Формат :attribute не є коректним.',
    'required' => 'Поле :attribute є обов\'язковим.',
    'required_if' => 'Поле :attribute є обов\'язковим якщо :other це :value.',
    'required_unless' => 'Поле :attribute є обов\'язковим якщо :other не є :values.',
    'required_with' => 'Поле :attribute є обов\'язковим якщо :values непусті.',
    'required_with_all' => 'Поле :attribute є обов\'язковим якщо :values непусті.',
    'required_without' => 'Поле :attribute є обов\'язковим when :values пусті.',
    'required_without_all' => 'Поле :attribute є обов\'язковим якщо жоден із :values не вибрано.',
    'same' => ':attribute та :other мають збігатися.',
    'size' => [
        'numeric' => ':attribute має бути :size.',
        'file' => ':attribute має бути :size кілобайт.',
        'string' => ':attribute має бути :size символів.',
        'array' => ':attribute має містити :size елементів.',
    ],
    'starts_with' => ':attribute має починатися з: :values.',
    'string' => ':attribute має бути рядком.',
    'timezone' => ':attribute має бути коректною зоною.',
    'unique' => ':attribute вже зайнято.',
    'uploaded' => 'Помилка при завантаженні :attribute.',
    'url' => 'Формат :attribute не є коректним.',
    'uuid' => ':attribute має бути коректним UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
