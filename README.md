# Buto-Plugin-ValidateDigits
Validate digits length.

## Usage
Add placeholder when using with plugin form/form_v1.
```
items:
  cellphone:
    type: varchar
    label: Cellphone
    placeholder: '(10 digits)'
```
Add without placeholder.
```
items:
  cellphone:
    type: varchar
    label: Cellphone
    validator:
      -
        plugin: validate/digits
        method: validate_digits
        data:
          length: 10
```
