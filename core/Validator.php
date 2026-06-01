<?php

class Validator
{
    private array $errors = [];

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];

        foreach ($rules as $field => $fieldRules) {

            $value = trim($data[$field] ?? '');

            $fieldRules = explode('|', $fieldRules);

            foreach ($fieldRules as $rule) {

                switch ($rule) {

                    case 'required':
                        if ($value === '') {
                            $this->addError($field, "{$field} is required.");
                        }
                        break;

                    case 'email':
                        if ($value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->addError($field, "{$field} must be a valid email.");
                        }
                        break;

                    case 'string':
                        if ($value !== '' && !is_string($value)) {
                            $this->addError($field, "{$field} must be a string.");
                        }
                        break;

                    case 'number':
                        if ($value !== '' && !is_numeric($value)) {
                            $this->addError($field, "{$field} must be a number.");
                        }
                    case 'file':
                        if ($value !== '' && !is_file($value)) {
                            $this->addError($field, "{$field} must be a file.");
                        }
                        break;
                    case 'image':
                        if ($value !== '' && !File::isImage($value)) {
                            $this->addError($field, "{$field} must be an image.");
                        }
                        break;
                    case 'document':
                        if ($value !== '' && !File::isDocument($value)) {
                            $this->addError($field, "{$field} must be a document.");
                        }
                        break;
                }
            }
        }

        return empty($this->errors);
    }

    private function addError(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
        setFlashMessage($field, $message);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function firstError(): ?string
    {
        foreach ($this->errors as $fieldErrors) {
            return $fieldErrors[0];
        }

        return null;
    }
}
