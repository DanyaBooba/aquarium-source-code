<?php

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

return [
    "accepted" => "Вы должны принять :attribute.",
    "accepted_if" => "Вы должны принять :attribute, когда :other содержит :value.",
    "active_url" => "Значение поля :attribute должно быть действительным URL адресом.",
    "after" => "Значение поля :attribute должно быть датой после :date.",
    "after_or_equal" => "Значение поля :attribute должно быть датой после или равной :date.",
    "alpha" => "Значение поля :attribute может содержать только буквы.",
    "alpha_dash" => "Значение поля :attribute может содержать только буквы, цифры, дефис и нижнее подчеркивание.",
    "alpha_num" => "Значение поля :attribute может содержать только буквы и цифры.",
    "array" => "Значение поля :attribute должно быть массивом.",
    "ascii" => "Значение поля :attribute должно содержать только однобайтовые цифро-буквенные символы.",
    "attached" => "Содержимое поля :attribute уже прикреплено.",
    "before" => "Значение поля :attribute должно быть датой до :date.",
    "before_or_equal" => "Значение поля :attribute должно быть датой до или равной :date.",
    "between.array" => "Количество элементов в поле :attribute должно быть от :min до :max.",
    "between.file" => "Размер файла в поле :attribute должен быть от :min до :max Кб.",
    "between.numeric" => "Значение поля :attribute должно быть от :min до :max.",
    "between.string" => "Количество символов в поле :attribute должно быть от :min до :max.",
    "boolean" => "Значение поля :attribute должно быть логического типа.",
    "can" => "Значение поля :attribute должно быть авторизованным.",
    "confirmed" => "Значение поля :attribute не совпадает с подтверждаемым.",
    "current_password" => "Неверный пароль.",
    "date" => "Значение поля :attribute должно быть корректной датой.",
    "date_equals" => "Значение поля :attribute должно быть датой равной :date.",
    "date_format" => "Значение поля :attribute должно соответствовать формату даты: :format.",
    "decimal" => "Значение поля :attribute должно содержать :decimal цифр десятичных разрядов.",
    "declined" => "Значение поля :attribute должно быть отклонено.",
    "declined_if" => "Значение поля :attribute должно быть отклонено, когда :other содержит :value.",
    "different" => "Значения полей :attribute и :other должны различаться.",
    "digits" => "Количество символов в поле :attribute должно быть равным :digits.",
    "digits_between" => "Количество символов в поле :attribute должно быть от :min до :max.",
    "dimensions" => "Изображение, указанное в поле :attribute, имеет недопустимые размеры.",
    "distinct" => "Элементы в значении поля :attribute не должны повторяться.",
    "doesnt_end_with" => "Значение поля :attribute не должно заканчиваться одним из следующих: :values.",
    "doesnt_start_with" => "Значение поля :attribute не должно начинаться с одного из следующих: :values.",
    "email" => "Значение поля :attribute должно быть действительным электронным адресом.",
    "ends_with" => "Значение поля :attribute должно заканчиваться одним из следующих: :values",
    "enum" => "Значение поля :attribute отсутствует в списке разрешённых.",
    "exists" => "Значение поля :attribute не существует.",
    "extensions" => "Файл в поле :attribute должен иметь одно из следующих расширений: :values.",
    "failed" => "Неверное имя пользователя или пароль.",
    "file" => "В поле :attribute должен быть указан файл.",
    "filled" => "Значение поля :attribute обязательно для заполнения.",
    "gt.array" => "Количество элементов в поле :attribute должно быть больше :value.",
    "gt.file" => "Размер файла, указанный в поле :attribute, должен быть больше :value Кб.",
    "gt.numeric" => "Значение поля :attribute должно быть больше :value.",
    "gt.string" => "Количество символов в поле :attribute должно быть больше :value.",
    "gte.array" => "Количество элементов в поле :attribute должно быть :value или больше.",
    "gte.file" => "Размер файла, указанный в поле :attribute, должен быть :value Кб или больше.",
    "gte.numeric" => "Значение поля :attribute должно быть :value или больше.",
    "gte.string" => "Количество символов в поле :attribute должно быть :value или больше.",
    "hex_color" => "Значение поля :attribute должно быть корректным цветом в HEX формате.",
    "image" => "Файл, указанный в поле :attribute, должен быть изображением.",
    "in" => "Значение поля :attribute отсутствует в списке разрешённых.",
    "in_array" => "Значение поля :attribute должно быть указано в поле :other.",
    "integer" => "Значение поля :attribute должно быть целым числом.",
    "ip" => "Значение поля :attribute должно быть действительным IP-адресом.",
    "ipv4" => "Значение поля :attribute должно быть действительным IPv4-адресом.",
    "ipv6" => "Значение поля :attribute должно быть действительным IPv6-адресом.",
    "json" => "Значение поля :attribute должно быть JSON строкой.",
    "list" => "Значение поля :attribute должно быть списком.",
    "lowercase" => "Значение поля :attribute должно быть в нижнем регистре.",
    "lt.array" => "Количество элементов в поле :attribute должно быть меньше :value.",
    "lt.file" => "Размер файла, указанный в поле :attribute, должен быть меньше :value Кб.",
    "lt.numeric" => "Значение поля :attribute должно быть меньше :value.",
    "lt.string" => "Количество символов в поле :attribute должно быть меньше :value.",
    "lte.array" => "Количество элементов в поле :attribute должно быть :value или меньше.",
    "lte.file" => "Размер файла, указанный в поле :attribute, должен быть :value Кб или меньше.",
    "lte.numeric" => "Значение поля :attribute должно быть равным или меньше :value.",
    "lte.string" => "Количество символов в поле :attribute должно быть :value или меньше.",
    "mac_address" => "Значение поля :attribute должно быть корректным MAC-адресом.",
    "max.array" => "Количество элементов в поле :attribute не может превышать :max.",
    "max.file" => "Размер файла в поле :attribute не может быть больше :max Кб.",
    "max.numeric" => "Значение поля :attribute не может быть больше :max.",
    "max.string" => "Количество символов в значении поля :attribute не может превышать :max.",
    "max_digits" => "Значение поля :attribute не должно содержать больше :max цифр.",
    "mimes" => "Файл, указанный в поле :attribute, должен быть одного из следующих типов: :values.",
    "mimetypes" => "Файл, указанный в поле :attribute, должен быть одного из следующих типов: :values.",
    "min.array" => "Количество элементов в поле :attribute должно быть не меньше :min.",
    "min.file" => "Размер файла, указанный в поле :attribute, должен быть не меньше :min Кб.",
    "min.numeric" => "Значение поля :attribute должно быть не меньше :min.",
    "min.string" => "Количество символов в поле :attribute должно быть не меньше :min.",
    "min_digits" => "Значение поля :attribute должно содержать не меньше :min цифр.",
    "missing" => "Значение поля :attribute должно отсутствовать.",
    "missing_if" => "Значение поля :attribute должно отсутствовать, когда :other содержит :value.",
    "missing_unless" => "Значение поля :attribute должно отсутствовать, когда :other не содержит :value.",
    "missing_with" => "Значение поля :attribute должно отсутствовать, если :values указано.",
    "missing_with_all" => "Значение поля :attribute должно отсутствовать, когда указаны все :values.",
    "multiple_of" => "Значение поля :attribute должно быть кратным :value",
    "next" => "Вперёд &raquo;",
    "not_in" => "Значение поля :attribute находится в списке запрета.",
    "not_regex" => "Значение поля :attribute имеет некорректный формат.",
    "numeric" => "Значение поля :attribute должно быть числом.",
    "password" => "Некорректный пароль.",
    "password.letters" => "Значение поля :attribute должно содержать хотя бы одну букву.",
    "password.mixed" => "Значение поля :attribute должно содержать хотя бы одну прописную и одну строчную буквы.",
    "password.numbers" => "Значение поля :attribute должно содержать хотя бы одну цифру.",
    "password.symbols" => "Значение поля :attribute должно содержать хотя бы один символ.",
    "password.uncompromised" => "Значение поля :attribute обнаружено в утёкших данных. Пожалуйста, выберите другое значение для :attribute.",
    "present" => "Значение поля :attribute должно быть.",
    "present_if" => "Значение поля :attribute должно быть когда :other содержит :value.",
    "present_unless" => "Значение поля :attribute должно быть, если только :other не содержит :value.",
    "present_with" => "Значение поля :attribute должно быть когда одно из :values присутствуют.",
    "present_with_all" => "Значение поля :attribute должно быть когда все из значений присутствуют: :values.",
    "previous" => "&laquo; Назад",
    "prohibited" => "Значение поля :attribute запрещено.",
    "prohibited_if" => "Значение поля :attribute запрещено, когда :other содержит :value.",
    "prohibited_unless" => "Значение поля :attribute запрещено, если :other не состоит в :values.",
    "prohibits" => "Значение поля :attribute запрещает присутствие :other.",
    "regex" => "Значение поля :attribute имеет некорректный формат.",
    "relatable" => "Значение поля :attribute не может быть связано с этим ресурсом.",
    "required" => "Поле :attribute обязательно.",
    "required_array_keys" => "Массив, указанный в поле :attribute, обязательно должен иметь ключи: :values",
    "required_if" => "Поле :attribute обязательно для заполнения, когда :other содержит :value.",
    "required_if_accepted" => "Поле :attribute обязательно, когда :other принято.",
    "required_unless" => "Поле :attribute обязательно для заполнения, когда :other не содержит :values.",
    "required_with" => "Поле :attribute обязательно для заполнения, когда :values указано.",
    "required_with_all" => "Поле :attribute обязательно для заполнения, когда :values указано.",
    "required_without" => "Поле :attribute обязательно для заполнения, когда :values не указано.",
    "required_without_all" => "Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.",
    "reset" => "Ваш пароль был сброшен.",
    "same" => "Значения полей :attribute и :other должны совпадать.",
    "sent" => "Ссылка на сброс пароля была отправлена.",
    "size.array" => "Количество элементов в поле :attribute должно быть равным :size.",
    "size.file" => "Размер файла, указанный в поле :attribute, должен быть равен :size Кб.",
    "size.numeric" => "Значение поля :attribute должно быть равным :size.",
    "size.string" => "Количество символов в поле :attribute должно быть равным :size.",
    "starts_with" => "Поле :attribute должно начинаться с одного из следующих значений: :values",
    "string" => "Значение поля :attribute должно быть строкой.",
    "throttle" => "Слишком много попыток входа. Пожалуйста, попробуйте ещё раз через :seconds секунд.",
    "throttled" => "Пожалуйста, подождите перед повторной попыткой.",
    "timezone" => "Значение поля :attribute должно быть действительным часовым поясом.",
    "token" => "Ошибочный код сброса пароля.",
    "ulid" => "Значение поля :attribute должно быть корректным ULID.",
    "unique" => "Такое значение поля :attribute уже существует.",
    "uploaded" => "Загрузка файла из поля :attribute не удалась.",
    "uppercase" => "Значение поля :attribute должно быть в верхнем регистре.",
    "url" => "Значение поля :attribute не является ссылкой или имеет некорректный формат.",
    "user" => "Не удалось найти пользователя с указанным электронным адресом.",
    "uuid" => "Значение поля :attribute должно быть корректным UUID.",


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
        'email.required' => 'Я гей!'
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

    'attributes' => [
        'title' => 'заголовок',
        'content' => 'содержание',
        'message' => 'сообщение',
        'username' => 'имя пользователя',
        'first_name' => 'имя',
        'last_name' => 'фамилия',
        'email' => 'почта',
        'password' => 'пароль',
        'currentPassword' => 'текущий пароль',
        'newPassword' => 'новый пароль',
        'currentEmail' => 'текущая почта',
        'newEmail' => 'новая почта',
        'icon' => 'иконка',
        'cap' => 'шапка',
        'image' => 'изображение',
        'cap' => 'шапка',
        'avatar' => 'аватарка',
        'logo' => 'логотип'
    ],
];
