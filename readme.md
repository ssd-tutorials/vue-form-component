# Advanced Form Component with VueJs

Exercise files for the course ***Advanced Form Component with VueJs***

### Email regex

```php
/^[a-zA-Z0-9._\-]+@[a-zA-Z0-9]+([.\-]?[a-zA-Z0-9]+)?([\.]{1}[a-zA-Z]{2,4}){1,4}$/
```

### Password regex

```php
/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,30}$/
```

### CKEditor toolbar

```javascript
full: [
    { name: 'document', items : [ 'Source', '-', 'Maximize'] },
    { name: 'editing', items : [ 'Replace', '-', 'SelectAll', 'ShowBlocks' ] },
    { name: 'clipboard', items : [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'links', items : [ 'Link', 'Unlink' ] },
    { name: 'insert', items : [ 'Image', 'Table', 'pbckcode', 'Templates', 'qrc', 'SpecialChar' ] },
    { name: 'basicstyles', items : [ 'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat' ] },
    { name: 'paragraph', items : [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
    { name: 'stylesmenus', items : [ 'Subscript', 'Styles', 'Format', 'CmdTokens' ] }
]
```
