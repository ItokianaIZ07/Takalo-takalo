TODOLIST (FRONTOFFICE(utilisateur)):
    - Inscription et login :
        - Base :
            - Table : user(id, username, email, password)
        - Model :
            - Page et fonction : UserModel.php(createUser, CheckUser, setUser, deleteUser, findAllUser, findUserById)
        - Controller :
            - Page et fonction (add function in route): UserController.php(CreateUser, ValidUSer)
        - Integration : 
            - views : url(user-login), page(user-login.php)
            - include : header and footer
        - DESIGNE :
            - css
            - js
    - Gestion des objets :
        - Base :
            - Table : Object(id, id_category, id_user, description, name, prix_estimatif)
                      image(id, id_object, path)
        - Model :
            - Page et fonction : ObjectModel.php(addnewObject, getById, getAllObject, getByCategory, update, removeObject)
                                 imageModel.php(addImage, removeImage)
        - Controller :
            - Page et fonction (add function in route): ObjectController.php(addnewObject, getById, getAllObject, getByCategory, update, removeObject)
                                                        imageController.php(addImage, removeImage)
        - Integration : 
            - views : url(own-object, Create-object, set-object), page(own-object.php)
            - include : header and footer
            - condition : boucle des objects
        - DESIGNE :
            - css
            - js
    - Proposion d'echange :
        