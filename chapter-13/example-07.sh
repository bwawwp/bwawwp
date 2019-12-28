xgettext -o languages/schoolpress.pot \
--default-domain=schoolpress \
--language=PHP \
--keyword=_ \
--keyword=__ \
--keyword=_e \
--keyword=_ex \
--keyword=_x \
--keyword=_n \
--sort-by-file \
--copyright-holder="SchoolPress" \
--package-name=schoolpress \
--package-version=1.0 \
--msgid-bugs-address="info@schoolpress.me" \
--directory=. \
$(find . -name "*.php")