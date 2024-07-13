# Summer Project - PHP/SQL/TWIG

## Based on the class bloog project, create a website using :-

 - **Object Oriented PHP**
 - **Twig**
 - **Tailwind or Bootstrap (I'd prefer to use TW)**
 - **Database from [Bloog](https://github.com/Leerlandais/BlOOG1) project with added fields (e.g. article_rating (linked to comments))**


### Include

- User Accounts
- User Access Level (SuperAdmin, Admin, Manager, Author, Member) 
    - SuperAdmin - Absolute Control 
    - Admin - Full Control of Articles and Users
    - Manager - Create, Read, Update and Change visibility of articles/comments
    - Author - Can propose new articles (to be verified by Manager/Admin before publication)
    - Member - Can leave comments and rate articles

### Public Pages

- Landing (links to articles, categories, tags and login/createUser)
- All Articles
- One Article
- View by Category
- View by Tag
- Create User
- 404

### Private Pages (varies depending on User Level)

- *Member*
  - As for standard visitor but article pages include "Leave a Comment" form
- *Author*
  - Article Creation page
  - Article Update page (for own articles)
- *Manager*
  - As for *Author*
  - Article Update page (for all articles)
  - Comment Control page (hide comments, flag abusive users for admin)
- *Admin*
  - As for *Manager*
  - User Control page (promote or banish users)
- *SuperAdmin*
  - Absolute control

