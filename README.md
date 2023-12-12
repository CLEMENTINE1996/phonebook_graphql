Design & Develop a GraphQL API
for a simple phonebook application.


Commands:<br>

Register your user account:<br>
-------------------------------------------------
mutation {
  userRegister(
    input: {
      name: "Your Name"
      email: "Your Email"
      password: "Your Password"
      password_confirmation: "Confirm your Password"
    }
  ) {
    status
    tokens {
      token_type
      access_token
      user {
	  id
          name
	  email
      }
    }
  }
}
-------------------------------------------------

Logging in using your account:<br>
-------------------------------------------------
mutation {
  login(input: { username: "your_email", password: "your_password" }) {
    access_token
    expires_in
    token_type
    user {
      id
      email
      name
    }
  }
}
-------------------------------------------------
"Note: make sure to copy and save your access token that has been generated after logging in before executing another command."<br>


"Note: in order for the other commands to work, add the '{ "Authorization": "Bearer {YOUR_ACCESS_TOKEN}" to the header.'<br>
1. For viewing the list of all saved contacts.
-------------------------------------------------
{
  listContacts{
    id
    name
    contact_no
  }
}
-------------------------------------------------
2. For viewing specific contact.

{
  viewContact(id: {CONTACT_ID}){
    id
    name
    contact_no
  }
}
-------------------------------------------------
3. For creating new contact
-------------------------------------------------
mutation {
  createContact(name: "NAME", contact_no: "NUMBER") {
    message
    status_code
    item{
      id
      name
      contact_no
    }
  }
}
-------------------------------------------------
4. For updating a contact
-------------------------------------------------
mutation {
  updateContact(id: ID, name: "NAME", contact_no: "NUMBER") {
    message
    status_code
    item{
      id
      name
      contact_no
    }
  }
}
-------------------------------------------------
5. For deleting a contact
-----------------------------------------------
mutation {
  deleteContact(id: ID) {
    message
    status_code
    item{
      id
      name
      contact_no
    }
  }
}
-------------------------------------------------
"Note: you can use/import the phonebook database (phonebookdb.sql) located on database folder or you can use the migration."


The phonebook application has the following fields: name, contact_no. only.<br>
It contains the following features: create, view, list, update and delete a contact.<br>
Requirements:<br>
1. Use Laravel as PHP framework<br>
2. Use a Lighthouse package to structure/build your GraphQL API<br>
Expected Output:<br>
● You API should be accessible through the /graphql endpoint<br>
● Your API should have the following schema (functionalities)<br>
● Your API should also contain an authentication to access the endpoint.<br>
Note:<br>
A plus if you do clean code and reusability in mind while coding.<br>
More info:<br>
GraphQL: https://graphql.org<br>
Lighthouse package: https://lighthouse-php.com<br>
Laravel: http://laravel.com/docs/10.x<br>



