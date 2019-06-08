<ul>
    <li class="<?= isActive('dashboard') ?>"><a href="/borrower/dashboard"><i class="material-icons">person</i> Dane konta</a></li>
    <li class="<?= isActive('edit') ?>"><a href="/borrower/edit"><i class="material-icons">edit</i> Edytuj profil</a></li>
    <li class="<?= isActive('security') ?>"><a href="/borrower/security"><i class="material-icons">https</i> Zmień hasło</a></li>
    <li class="<?= isActive('history') ?>"><a href="/borrower/history"><i class="material-icons">history</i> Wypożyczenia</a></li>
    <li><a href="/logout"><i class="material-icons">first_page</i> Wyloguj się</a></li>
</ul>